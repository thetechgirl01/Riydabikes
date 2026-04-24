<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\NewNotification;
use App\Models\Settings;
use App\Models\Tp_Transaction;
use App\Models\User;
use App\Models\Wdmethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShipmentBookingController extends Controller
{
    private function settings()
    {
        return Settings::where('id', 1)->first();
    }

    /**
     * Show the public booking form.
     */
    public function create()
    {
        return view('home.shipments.create', [
            'settings'       => $this->settings(),
            'paymentMethods' => $this->bankTransferMethods(),
            'title'          => 'Book a Delivery',
        ]);
    }

    /**
     * Store a new shipment from the public form.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Sender
            'sname'             => 'required|string|max:255',
            'sender_phone'      => 'required|string|max:30',
            'sender_email'      => 'required|email|max:255',
            'saddress'          => 'required|string|max:500',
            'take_off_point'    => 'required|string|max:255',

            // Receiver
            'name'              => 'required|string|max:255',
            'phone'             => 'required|string|max:30',
            'email'             => 'nullable|email|max:255',
            'address'           => 'required|string|max:500',
            'final_destination' => 'required|string|max:255',

            // Package
            'description'       => 'required|string|max:1000',
            'qty'               => 'required|integer|min:1',
            'weight'            => 'nullable|string|max:50',
            'package_size'      => 'nullable|string|max:50',
            'package_value'     => 'nullable|numeric|min:0',

            // Service
            'freight_type'      => 'required|string|in:Express,Standard',
            'shipment_type'     => 'required|string|in:Delivery,Shipment',

            // Payment
            'cost'              => 'required|numeric|min:0',
            'payment_method'    => 'required|string',
            'proof'             => 'nullable|image|mimes:jpg,jpeg,png|max:4096',

            // Other
            'delivery_notes'    => 'nullable|string|max:1000',
            'photo'             => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $method = $data['payment_method'];

        // Phase 1: only Bank Transfer is fully wired. Card gateways come next.
        if (in_array($method, ['Paystack', 'Flutterwave'])) {
            return redirect()->back()
                ->withInput()
                ->with('info', "Card payments via {$method} are coming soon. Please choose Bank Transfer for now and we'll process your order immediately.");
        }

        // Bank Transfer must include payment proof
        if ($method === 'Bank Transfer' && ! $request->hasFile('proof')) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['proof' => 'Please upload your bank transfer payment proof (a screenshot or photo of the receipt).']);
        }

        // ---------- Create the shipment row ----------
        $shipment = new User();

        $shipment->sname             = $data['sname'];
        $shipment->saddress          = $data['saddress'];
        $shipment->take_off_point    = $data['take_off_point'];
        $shipment->location          = $data['take_off_point'];

        $shipment->name              = $data['name'];
        $shipment->phone             = $data['phone'];
        // Receiver email may be empty; fall back to sender email so admin always has a contact.
        $shipment->email             = $data['email'] ?? $data['sender_email'];
        $shipment->address           = $data['address'];
        $shipment->final_destination = $data['final_destination'];

        $shipment->description       = $data['description'];
        $shipment->qty               = $data['qty'];
        $shipment->weight            = $data['weight'] ?? null;
        $shipment->package_size      = $data['package_size'] ?? null;
        $shipment->package_value     = $data['package_value'] ?? null;

        $shipment->freight_type      = $data['freight_type'];
        $shipment->shipment_type     = $data['shipment_type'];
        $shipment->cost              = $data['cost'];
        $shipment->clearance_cost    = 0;

        $shipment->delivery_notes    = $data['delivery_notes'] ?? null;

        // Public-form metadata
        $shipment->shipment_source   = 'public';
        $shipment->cstatus           = 'Shipment'; // distinguishes from CRM customers/leads
        $shipment->payment_method    = $method;
        $shipment->payment_status    = 'Pending';

        // Sender contact stored in unused field so admin can see it
        // (we use the standard `username` slot since this row isn't a real user account)
        $shipment->username          = $data['sender_email'] ?? null;

        // Package photo
        if ($request->hasFile('photo')) {
            $img = $request->file('photo');
            $imgName = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '', $img->getClientOriginalName());
            $img->move(public_path('shipment_photos'), $imgName);
            $shipment->photo = 'shipment_photos/' . $imgName;
        }

        // Payment proof (bank transfer)
        if ($request->hasFile('proof')) {
            $p = $request->file('proof');
            $pName = time() . '_proof_' . preg_replace('/[^A-Za-z0-9._-]/', '', $p->getClientOriginalName());
            $p->move(public_path('shipment_payment_proofs'), $pName);
            $shipment->payment_proof = 'shipment_payment_proofs/' . $pName;
        }

        $shipment->trackingnumber = $this->generateTrackingNumber();
        $shipment->status         = 'Order Confirmed';

        // We need *something* in `password` to satisfy NOT NULL on the users table.
        // It's never used to log in; this row is just a shipment record.
        $shipment->password = bcrypt(Str::random(40));

        $shipment->save();

        // Initial tracking entry
        Tp_Transaction::create([
            'user'    => $shipment->id,
            'address' => $shipment->take_off_point,
            'city'    => '',
            'country' => '',
            'status'  => 'Order Confirmed',
            'comment' => 'Shipment booked online by sender. Awaiting payment confirmation.',
        ]);

        // Notifications
        $this->notifySender($shipment);
        $this->notifyAdmin($shipment);

        return redirect()->route('home.shipments.success', $shipment->trackingnumber);
    }

    /**
     * Success page shown after submission.
     */
    public function success($trackingnumber)
    {
        $shipment = User::where('trackingnumber', $trackingnumber)
            ->where('shipment_source', 'public')
            ->firstOrFail();

        return view('home.shipments.success', [
            'shipment' => $shipment,
            'settings' => $this->settings(),
            'title'    => 'Booking Confirmed',
        ]);
    }

    /**
     * "My orders" page — reads tracking IDs from the visitor's localStorage,
     * fetches the matching shipments, and displays them.
     */
    public function myOrders()
    {
        return view('home.shipments.my-orders', [
            'settings' => $this->settings(),
            'title'    => 'My Orders',
        ]);
    }

    /**
     * AJAX endpoint for the My Orders page — accepts a list of tracking IDs
     * and returns the shipment summaries.
     */
    public function lookup(Request $request)
    {
        $request->validate([
            'tracking_ids'   => 'required|array|max:50',
            'tracking_ids.*' => 'string|max:50',
        ]);

        $shipments = User::whereIn('trackingnumber', $request->tracking_ids)
            ->where('shipment_source', 'public')
            ->orderByDesc('created_at')
            ->get([
                'id', 'trackingnumber', 'sname', 'name',
                'take_off_point', 'final_destination',
                'cost', 'status', 'payment_status', 'created_at',
            ]);

        return response()->json(['shipments' => $shipments]);
    }

    // ---------- Helpers ----------

    /**
     * Mirrors the format used by ShipmentController::generateTrackingNumber().
     * Format: SS-NNNN-XXXXXXXX  (SS = 2-letter site prefix)
     */
    private function generateTrackingNumber(): string
    {
        $settings = $this->settings();
        $prefix   = strtoupper(substr($settings->site_name ?? 'SH', 0, 2));

        do {
            $year         = rand(1000, 9999);
            $randomString = strtoupper(Str::random(8));
            $tracking     = "{$prefix}-{$year}-{$randomString}";
        } while (User::where('trackingnumber', $tracking)->exists());

        return $tracking;
    }

    private function bankTransferMethods()
    {
        // Reuse your existing payment methods table; admin can add bank accounts there.
        return Wdmethod::where('status', 'enabled')
            ->where(function ($q) {
                $q->where('type', 'deposit')->orWhere('type', 'both');
            })
            ->get();
    }

    private function notifySender(User $shipment): void
    {
        try {
            $settings = $this->settings();
            $body = $this->renderSenderEmail($shipment, $settings);

            Mail::to($shipment->username ?: $shipment->email)
                ->send(new NewNotification(
                    $body,
                    'Booking Confirmed - Tracking #' . $shipment->trackingnumber,
                    $shipment->sname
                ));
        } catch (\Throwable $e) {
            Log::error('Sender email failed: ' . $e->getMessage());
        }
    }

    private function notifyAdmin(User $shipment): void
    {
        try {
            $settings = $this->settings();
            if (! $settings || ! $settings->contact_email) return;

            $body = $this->renderAdminEmail($shipment, $settings);

            Mail::to($settings->contact_email)
                ->send(new NewNotification(
                    $body,
                    'New Shipment Booking - ' . $shipment->trackingnumber,
                    'Admin'
                ));
        } catch (\Throwable $e) {
            Log::error('Admin email failed: ' . $e->getMessage());
        }
    }

    private function renderSenderEmail(User $s, $settings): string
    {
        $currency = $settings->s_currency ?? '₦';
        $cost     = number_format($s->cost, 2);
        return "
        <p>Hi {$s->sname},</p>
        <p>Your delivery booking has been received. Here are your details:</p>
        <div style='background:#e0f2fe;padding:15px;border-left:4px solid #0369a1;margin:20px 0;border-radius:4px;'>
            <p style='margin:8px 0;'><strong>Tracking Number:</strong> {$s->trackingnumber}</p>
            <p style='margin:8px 0;'><strong>From:</strong> {$s->take_off_point}</p>
            <p style='margin:8px 0;'><strong>To:</strong> {$s->final_destination}</p>
            <p style='margin:8px 0;'><strong>Service:</strong> {$s->freight_type} {$s->shipment_type}</p>
            <p style='margin:8px 0;'><strong>Total:</strong> {$currency}{$cost}</p>
            <p style='margin:8px 0;'><strong>Payment Method:</strong> {$s->payment_method}</p>
        </div>
        <p>We'll verify your payment and start processing your shipment. You can track its progress at any time using your tracking number.</p>
        <p>Thank you for choosing {$settings->site_name}.</p>";
    }

    private function renderAdminEmail(User $s, $settings): string
    {
        $currency = $settings->s_currency ?? '₦';
        $cost     = number_format($s->cost, 2);
        return "
        <p>A new shipment was just booked through the website.</p>
        <ul>
            <li><strong>Tracking:</strong> {$s->trackingnumber}</li>
            <li><strong>Sender:</strong> {$s->sname} ({$s->username})</li>
            <li><strong>Receiver:</strong> {$s->name} ({$s->phone})</li>
            <li><strong>Route:</strong> {$s->take_off_point} → {$s->final_destination}</li>
            <li><strong>Service:</strong> {$s->freight_type} {$s->shipment_type}</li>
            <li><strong>Amount:</strong> {$currency}{$cost} via {$s->payment_method}</li>
        </ul>
        <p>Open the admin panel to verify the payment proof and approve the shipment.</p>";
    }
}