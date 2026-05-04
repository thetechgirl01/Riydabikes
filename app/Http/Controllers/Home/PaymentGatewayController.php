<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\NewNotification;
use App\Models\Settings;
use App\Models\Tp_Transaction;
use App\Models\User;
use App\Services\PaymentGatewayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PaymentGatewayController extends Controller
{
    public function __construct(private PaymentGatewayService $gateways) {}

    // ============================================================
    //  PAYSTACK
    // ============================================================

    /** Called from booking controller after the delivery row is saved. */
    public function paystackInit(User $shipment)
    {
        $cfg = $this->gateways->paystack();
        if (! $cfg) {
            return redirect()->route('home.shipments.create')->with('info', 'Paystack is not configured. Please choose another payment method.');
        }

        // Use sender email as the paying customer
        $email = $shipment->username ?: $shipment->email;
        if (! $email) {
            return redirect()->route('home.shipments.create')->with('info', 'Email is required for card payment.');
        }

        // Reference we control — used to look up the shipment on callback
        $reference = 'RYDPS_' . $shipment->id . '_' . strtoupper(Str::random(10));

        $shipment->payment_reference = $reference;
        $shipment->save();

        try {
            $resp = Http::withToken($cfg->secret_key)
                ->acceptJson()
                ->post('https://api.paystack.co/transaction/initialize', [
                    'email'        => $email,
                    'amount'       => (int) round($shipment->cost * 100), // kobo
                    'reference'    => $reference,
                    'callback_url' => $cfg->callback_url,
                    'currency'     => 'NGN',
                    'metadata'     => [
                        'shipment_id'    => $shipment->id,
                        'tracking_number'=> $shipment->trackingnumber,
                    ],
                ]);

            $body = $resp->json();
            if (! $resp->ok() || empty($body['status']) || empty($body['data']['authorization_url'])) {
                Log::error('Paystack init failed', ['response' => $body]);
                return redirect()->route('home.shipments.create')->with('info', 'Could not start Paystack checkout. Please try Bank Transfer or contact support.');
            }

            return redirect($body['data']['authorization_url']);
        } catch (\Throwable $e) {
            Log::error('Paystack init exception: ' . $e->getMessage());
            return redirect()->route('home.shipments.create')->with('info', 'Paystack is unreachable right now. Please try Bank Transfer.');
        }
    }

    /** Browser-redirect callback after Paystack checkout. */
    public function paystackCallback(Request $request)
    {
        $cfg = $this->gateways->paystack();
        $reference = $request->query('reference') ?? $request->query('trxref');
        if (! $cfg || ! $reference) {
            return view('home.shipments.payment-failed', ['reason' => 'Invalid callback']);
        }

        $shipment = User::where('payment_reference', $reference)
            ->where('shipment_source', 'public')
            ->first();

        if (! $shipment) {
            return view('home.shipments.payment-failed', ['reason' => 'Booking not found for this payment.']);
        }

        try {
            $resp = Http::withToken($cfg->secret_key)
                ->acceptJson()
                ->get("https://api.paystack.co/transaction/verify/{$reference}");

            $body = $resp->json();

            if (! $resp->ok() || empty($body['status']) || ($body['data']['status'] ?? null) !== 'success') {
                $shipment->payment_status = 'Failed';
                $shipment->save();
                return view('home.shipments.payment-failed', ['reason' => 'Payment was not successful.', 'shipment' => $shipment]);
            }

            $verifiedAmountNaira = ($body['data']['amount'] ?? 0) / 100;
            if ((float) $verifiedAmountNaira < (float) $shipment->cost) {
                Log::warning('Paystack amount mismatch', [
                    'expected' => $shipment->cost,
                    'paid'     => $verifiedAmountNaira,
                    'ref'      => $reference,
                ]);
                $shipment->payment_status = 'Failed';
                $shipment->save();
                return view('home.shipments.payment-failed', ['reason' => 'Amount paid does not match expected total.']);
            }

            $this->markPaid($shipment, 'Paystack', $reference);
            return redirect()->route('home.shipments.success', $shipment->trackingnumber);

        } catch (\Throwable $e) {
            Log::error('Paystack verify exception: ' . $e->getMessage());
            return view('home.shipments.payment-failed', ['reason' => 'Could not verify payment. Contact support with reference ' . $reference]);
        }
    }

    /** Webhook from Paystack for late status updates. */
    public function paystackWebhook(Request $request)
    {
        $cfg = $this->gateways->paystack();
        if (! $cfg) return response('No config', 200);

        $signature = $request->header('x-paystack-signature');
        $body      = $request->getContent();
        $expected  = hash_hmac('sha512', $body, $cfg->secret_key);
        if (! $signature || ! hash_equals($expected, $signature)) {
            return response('Invalid signature', 401);
        }

        $payload = $request->json()->all();
        $event   = $payload['event'] ?? null;
        $ref     = $payload['data']['reference'] ?? null;
        if ($event !== 'charge.success' || ! $ref) return response('Ignored', 200);

        $shipment = User::where('payment_reference', $ref)->first();
        if ($shipment && $shipment->payment_status !== 'Approved') {
            $verifiedAmountNaira = ($payload['data']['amount'] ?? 0) / 100;
            if ((float) $verifiedAmountNaira >= (float) $shipment->cost) {
                $this->markPaid($shipment, 'Paystack', $ref);
            }
        }
        return response('OK', 200);
    }

    // ============================================================
    //  FLUTTERWAVE
    // ============================================================

    public function flutterwaveInit(User $shipment)
    {
        $cfg = $this->gateways->flutterwave();
        if (! $cfg) {
            return redirect()->route('home.shipments.create')->with('info', 'Flutterwave is not configured. Please choose another payment method.');
        }

        $email = $shipment->username ?: $shipment->email;
        if (! $email) {
            return redirect()->route('home.shipments.create')->with('info', 'Email is required for card payment.');
        }

        $reference = 'RYDFLW_' . $shipment->id . '_' . strtoupper(Str::random(10));
        $shipment->payment_reference = $reference;
        $shipment->save();

        try {
            $resp = Http::withToken($cfg->secret_key)
                ->acceptJson()
                ->post('https://api.flutterwave.com/v3/payments', [
                    'tx_ref'        => $reference,
                    'amount'        => (string) $shipment->cost,
                    'currency'      => 'NGN',
                    'redirect_url'  => $cfg->callback_url,
                    'customer'      => [
                        'email'       => $email,
                        'phonenumber' => $shipment->phone,
                        'name'        => $shipment->sname,
                    ],
                    'customizations' => [
                        'title'       => 'Riyda Bikes Delivery',
                        'description' => 'Delivery ' . $shipment->trackingnumber,
                    ],
                    'meta' => [
                        'shipment_id'     => $shipment->id,
                        'tracking_number' => $shipment->trackingnumber,
                    ],
                ]);

            $body = $resp->json();
            if (! $resp->ok() || ($body['status'] ?? null) !== 'success' || empty($body['data']['link'])) {
                Log::error('Flutterwave init failed', ['response' => $body]);
                return redirect()->route('home.shipments.create')->with('info', 'Could not start Flutterwave checkout. Please try Bank Transfer or contact support.');
            }

            return redirect($body['data']['link']);
        } catch (\Throwable $e) {
            Log::error('Flutterwave init exception: ' . $e->getMessage());
            return redirect()->route('home.shipments.create')->with('info', 'Flutterwave is unreachable right now. Please try Bank Transfer.');
        }
    }

    public function flutterwaveCallback(Request $request)
    {
        $cfg = $this->gateways->flutterwave();
        $status = $request->query('status');
        $txRef  = $request->query('tx_ref');
        $txId   = $request->query('transaction_id');

        if (! $cfg || ! $txRef) {
            return view('home.shipments.payment-failed', ['reason' => 'Invalid callback']);
        }

        $shipment = User::where('payment_reference', $txRef)
            ->where('shipment_source', 'public')
            ->first();

        if (! $shipment) {
            return view('home.shipments.payment-failed', ['reason' => 'Booking not found for this payment.']);
        }

        if ($status !== 'successful' || ! $txId) {
            $shipment->payment_status = 'Failed';
            $shipment->save();
            return view('home.shipments.payment-failed', ['reason' => 'Payment was not successful.', 'shipment' => $shipment]);
        }

        try {
            $resp = Http::withToken($cfg->secret_key)
                ->acceptJson()
                ->get("https://api.flutterwave.com/v3/transactions/{$txId}/verify");

            $body = $resp->json();
            $data = $body['data'] ?? [];

            $okStatus     = ($body['status'] ?? null) === 'success' && ($data['status'] ?? null) === 'successful';
            $okCurrency   = ($data['currency'] ?? null) === 'NGN';
            $okRef        = ($data['tx_ref'] ?? null) === $txRef;
            $verifiedAmt  = (float) ($data['amount'] ?? 0);
            $okAmount     = $verifiedAmt >= (float) $shipment->cost;

            if (! $okStatus || ! $okCurrency || ! $okRef || ! $okAmount) {
                Log::warning('Flutterwave verification mismatch', ['ref' => $txRef, 'verify' => $body]);
                $shipment->payment_status = 'Failed';
                $shipment->save();
                return view('home.shipments.payment-failed', ['reason' => 'Payment verification failed.']);
            }

            $this->markPaid($shipment, 'Flutterwave', $txRef);
            return redirect()->route('home.shipments.success', $shipment->trackingnumber);

        } catch (\Throwable $e) {
            Log::error('Flutterwave verify exception: ' . $e->getMessage());
            return view('home.shipments.payment-failed', ['reason' => 'Could not verify payment. Contact support with reference ' . $txRef]);
        }
    }

    public function flutterwaveWebhook(Request $request)
    {
        $cfg = $this->gateways->flutterwave();
        if (! $cfg) return response('No config', 200);

        $signature = $request->header('verif-hash');
        if (! $signature || ! $cfg->secret_hash || ! hash_equals($cfg->secret_hash, $signature)) {
            return response('Invalid signature', 401);
        }

        $payload = $request->json()->all();
        $event   = $payload['event'] ?? null;
        $data    = $payload['data'] ?? [];
        $ref     = $data['tx_ref'] ?? null;

        if ($event !== 'charge.completed' || ! $ref) return response('Ignored', 200);

        $shipment = User::where('payment_reference', $ref)->first();
        if ($shipment && $shipment->payment_status !== 'Approved') {
            $verifiedAmt = (float) ($data['amount'] ?? 0);
            if (($data['status'] ?? null) === 'successful' && $verifiedAmt >= (float) $shipment->cost) {
                $this->markPaid($shipment, 'Flutterwave', $ref);
            }
        }
        return response('OK', 200);
    }

    // ============================================================
    //  SHARED
    // ============================================================

    private function markPaid(User $shipment, string $method, string $reference): void
    {
        if ($shipment->payment_status === 'Approved') return; // idempotent

        $shipment->payment_status    = 'Approved';
        $shipment->payment_method    = $method;
        $shipment->payment_reference = $reference;
        if ($shipment->status === 'Pending Payment') {
            $shipment->status = 'Delivery Created';
        }
        $shipment->save();

        // Tracking record
        Tp_Transaction::create([
            'user'    => $shipment->id,
            'address' => $shipment->take_off_point,
            'city'    => '',
            'country' => '',
            'status'  => 'Payment Received',
            'comment' => "Payment of ₦" . number_format($shipment->cost, 2) . " received via {$method}.",
        ]);

        $this->notifySender($shipment, $method);
        $this->notifyAdmin($shipment, $method);
    }

    private function notifySender(User $s, string $method): void
    {
        try {
            $settings = Settings::find(1);
            $body = "<p>Hi {$s->sname},</p>
                     <p>We've received your payment of <strong>₦" . number_format($s->cost, 2) . "</strong> via {$method}. Your delivery is now being processed.</p>
                     <p><strong>Tracking number:</strong> {$s->trackingnumber}</p>
                     <p>Thank you for choosing {$settings->site_name}.</p>";
            Mail::to($s->username ?: $s->email)
                ->send(new NewNotification($body, "Payment Confirmed - {$s->trackingnumber}", $s->sname));
        } catch (\Throwable $e) {
            Log::error('Sender payment email failed: ' . $e->getMessage());
        }
    }

    private function notifyAdmin(User $s, string $method): void
    {
        try {
            $settings = Settings::find(1);
            if (! $settings || ! $settings->contact_email) return;
            $body = "<p>Card payment received.</p>
                     <ul>
                        <li><strong>Tracking:</strong> {$s->trackingnumber}</li>
                        <li><strong>Sender:</strong> {$s->sname}</li>
                        <li><strong>Amount:</strong> ₦" . number_format($s->cost, 2) . " via {$method}</li>
                        <li><strong>Reference:</strong> {$s->payment_reference}</li>
                     </ul>";
            Mail::to($settings->contact_email)
                ->send(new NewNotification($body, "Payment Confirmed - {$s->trackingnumber}", 'Admin'));
        } catch (\Throwable $e) {
            Log::error('Admin payment email failed: ' . $e->getMessage());
        }
    }
}