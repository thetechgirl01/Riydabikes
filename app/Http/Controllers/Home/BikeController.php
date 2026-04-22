<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use App\Models\BikePurchase;
use App\Models\BikeRental;
use App\Models\GuestUser;
use App\Models\Settings;
use App\Models\Wdmethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BikeController extends Controller
{
    private function settings()
    {
        return Settings::where('id', 1)->first();
    }

    private function paymentMethods()
    {
        return Wdmethod::where('status', 'enabled')
            ->where(function ($q) {
                $q->where('type', 'deposit')->orWhere('type', 'both');
            })
            ->get();
    }

    // ---------- Landing / listing ----------

    public function index()
    {
        $bikes = Bike::active()->orderByDesc('id')->paginate(12);

        return view('home.bikes.index', [
            'bikes'    => $bikes,
            'settings' => $this->settings(),
            'title'    => 'Bikes',
        ]);
    }

    public function show($slug)
    {
        $bike = Bike::active()->where('slug', $slug)->firstOrFail();

        return view('home.bikes.show', [
            'bike'     => $bike,
            'settings' => $this->settings(),
            'title'    => $bike->name,
        ]);
    }

    // ---------- Buy flow ----------

    public function buyForm($slug)
    {
        $bike = Bike::active()->where('slug', $slug)->firstOrFail();

        if (! $bike->isInStock()) {
            return redirect()->route('home.bikes.show', $bike->slug)
                ->with('error', 'This bike is currently out of stock.');
        }

        return view('home.bikes.buy', [
            'bike'     => $bike,
            'dmethods' => $this->paymentMethods(),
            'settings' => $this->settings(),
            'title'    => 'Buy ' . $bike->name,
        ]);
    }

    public function buyStore(Request $request, $slug)
    {
        $bike = Bike::active()->where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'quantity'         => 'required|integer|min:1|max:' . max(1, $bike->stock),
            'guest_name'       => 'required|string|max:200',
            'guest_email'      => 'required|email|max:200',
            'guest_phone'      => 'required|string|max:30',
            'shipping_address' => 'required|string|max:500',
            'city'             => 'required|string|max:100',
            'state'            => 'required|string|max:100',
            'payment_method'   => 'required|string|max:100',
            'proof'            => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $proofPath = $request->file('proof')->store('payment_proofs', 'public');

        $purchase = BikePurchase::create([
            'order_no'         => BikePurchase::generateOrderNo(),
            'bike_id'          => $bike->id,
            'quantity'         => $data['quantity'],
            'unit_price'       => $bike->price,
            'total_amount'     => $bike->price * $data['quantity'],
            'guest_name'       => $data['guest_name'],
            'guest_email'      => $data['guest_email'],
            'guest_phone'      => $data['guest_phone'],
            'shipping_address' => $data['shipping_address'],
            'city'             => $data['city'],
            'state'            => $data['state'],
            'payment_method'   => $data['payment_method'],
            'proof'            => $proofPath,
            'status'           => 'Pending',
        ]);

        $this->notifyNewOrder($purchase, 'purchase');

        return redirect()->route('home.bikes.purchase.receipt', $purchase->order_no);
    }

    public function purchaseReceipt($orderNo)
    {
        $purchase = BikePurchase::with('bike')->where('order_no', $orderNo)->firstOrFail();

        return view('home.bikes.purchase-receipt', [
            'purchase' => $purchase,
            'settings' => $this->settings(),
            'title'    => 'Order Receipt',
        ]);
    }

    // ---------- Hire flow ----------

    public function hireForm($slug)
    {
        $bike = Bike::hireable()->where('slug', $slug)->firstOrFail();

        return view('home.bikes.hire', [
            'bike'     => $bike,
            'dmethods' => $this->paymentMethods(),
            'settings' => $this->settings(),
            'title'    => 'Hire ' . $bike->name,
        ]);
    }

    public function hireQuote(Request $request, $slug)
    {
        $bike = Bike::hireable()->where('slug', $slug)->firstOrFail();

        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $start = Carbon::parse($request->start_date);
        $end   = Carbon::parse($request->end_date);
        $days  = $start->diffInDays($end) + 1;

        $conflict = BikeRental::hasConflict($bike->id, $start, $end);

        return response()->json([
            'available'    => ! $conflict,
            'total_days'   => $days,
            'daily_rate'   => (float) $bike->daily_rate,
            'total_amount' => (float) $bike->daily_rate * $days,
        ]);
    }

    public function hireStore(Request $request, $slug)
    {
        $bike = Bike::hireable()->where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'start_date'      => 'required|date|after_or_equal:today',
            'end_date'        => 'required|date|after_or_equal:start_date',
            'guest_name'      => 'required|string|max:200',
            'guest_email'     => 'required|email|max:200',
            'guest_phone'     => 'required|string|max:30',
            'pickup_address'  => 'nullable|string|max:500',
            'payment_method'  => 'required|string|max:100',
            'proof'           => 'required|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        if (BikeRental::hasConflict($bike->id, $data['start_date'], $data['end_date'])) {
            return back()
                ->withInput()
                ->with('error', 'Sorry — this bike has just been booked for part of those dates. Please pick different dates.');
        }

        $start = Carbon::parse($data['start_date']);
        $end   = Carbon::parse($data['end_date']);
        $days  = $start->diffInDays($end) + 1;

        $proofPath = $request->file('proof')->store('payment_proofs', 'public');

        $rental = BikeRental::create([
            'rental_no'      => BikeRental::generateRentalNo(),
            'bike_id'        => $bike->id,
            'start_date'     => $start->toDateString(),
            'end_date'       => $end->toDateString(),
            'total_days'     => $days,
            'daily_rate'     => $bike->daily_rate,
            'total_amount'   => $bike->daily_rate * $days,
            'guest_name'     => $data['guest_name'],
            'guest_email'    => $data['guest_email'],
            'guest_phone'    => $data['guest_phone'],
            'pickup_address' => $data['pickup_address'] ?? null,
            'payment_method' => $data['payment_method'],
            'proof'          => $proofPath,
            'status'         => 'Pending',
        ]);

        $this->notifyNewOrder($rental, 'rental');

        return redirect()->route('home.bikes.rental.receipt', $rental->rental_no);
    }

    public function rentalReceipt($rentalNo)
    {
        $rental = BikeRental::with('bike')->where('rental_no', $rentalNo)->firstOrFail();

        return view('home.bikes.rental-receipt', [
            'rental'   => $rental,
            'settings' => $this->settings(),
            'title'    => 'Rental Receipt',
        ]);
    }

    private function notifyNewOrder($order, string $type): void
    {
        $settings = $this->settings();
        if (! $settings || ! $settings->contact_email) {
            return;
        }

        try {
            $guest = new GuestUser($order->guest_name, $order->guest_email, $settings->currency ?? '₦');
        } catch (\Throwable $e) {
            Log::error('Bike order notification failed: ' . $e->getMessage());
        }
    }
}