<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Deposit;
use App\Models\Wdmethod;
use App\Models\Tp_Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositNotification;
use Illuminate\Support\Facades\Session;

class DepositController extends Controller
{
    /**
     * Display the deposit form page
     */
    public function showDepositForm(Request $request)
    {
        $dmethods = Wdmethod::where('status', 'enabled')
                   ->where(function($query) {
                       $query->where('type', 'deposit')
                             ->orWhere('type', 'both');
                   })
                   ->get();
        $settings = Settings::where('id', '1')->first();
        
        // Initialize variables
        $amount = null;
        $tracking = null;
        $name = null;
        $email = null;
        
        // Check if courier_id is provided
        if ($request->has('courier_id')) {
            // Get the courier details from the User model
            $courier = User::find($request->courier_id);
            
            if ($courier) {
                $amount = $courier->clearance_cost + $courier->cost;
                $tracking = $courier->trackingnumber;
                $name = $courier->name;
                $email = $courier->email;
                
                // Log the courier data
                \Log::info('Courier data retrieved:', [
                    'courier_id' => $request->courier_id,
                    'amount' => $amount,
                    'tracking' => $tracking,
                    'name' => $name,
                    'email' => $email
                ]);
            }
        } else {
            // Fallback to direct parameters if courier_id is not provided
            $amount = $request->has('amount') ? $request->amount : null;
            $tracking = $request->has('tracking') ? $request->tracking : null;
            $name = $request->has('name') ? $request->name : null;
            $email = $request->has('email') ? $request->email : null;
        }
        
        // Log the parameters to check if they're being received
        \Log::info('Deposit form parameters:', [
            'amount' => $amount,
            'tracking' => $tracking,
            'name' => $name,
            'email' => $email
        ]);
        
        return view('home.deposits', [
            'title' => 'Make a Deposit',
            'dmethods' => $dmethods,
            'prefilled_amount' => $amount,
            'tracking' => $tracking, // Add tracking number to view data
            'name' => $name, // Add name to view data
            'email' => $email, // Add email to view data
            'settings' => $settings,
        ]);
    }

    /**
     * Process deposit form submission and redirect to payment page
     */
    public function processDeposit(Request $request)
    {

        $this->validate($request, [
            'payment_method' => 'required',
            'amount' => 'required|numeric|min:1',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Get payment method details
        $payment_mode = Wdmethod::where('name', $request->payment_method)->first();
        
        if (!$payment_mode) {
            return redirect()->back()->with('error', 'Selected payment method not available.');
        }
        
        // Store info in session
        session([
            'amount' => $request->amount,
            'payment_method' => $payment_mode->id,
            'asset' => $request->asset ?? null,
            'tracking' => $request->tracking ?? null,
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        return redirect()->route('home.payment');
    }

    /**
     * Display the payment page with details
     */
    public function showPaymentPage()
    {
        // Check if required session data exists
        if (!session('amount') || !session('payment_method')) {
            return redirect()->route('home.deposits')->with('error', 'Please select a payment method and enter an amount first.');
        }
        
        $payment_mode = Wdmethod::findOrFail(session('payment_method'));
        $amount = session('amount');
        $asset = session('asset');
        $name = session('name');
        $email = session('email');
        
        return view('home.payment', [
            'title' => 'Complete Payment',
            'payment_mode' => $payment_mode,
            'amount' => $amount,
            'asset' => $asset,
            'name' => $name,
            'email' => $email,
        ]);
    }

    /**
     * Process the payment proof submission
     */
    public function processPaymentProof(Request $request)
    {
        $this->validate($request, [
            'proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'amount' => 'required|numeric',
            'method' => 'required',
            'email' => 'required|email',
            'name' => 'required|string|max:255',
        ]);

        // Upload proof image
        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $path = $file->store('payment_proofs', 'public');
        } else {
            return redirect()->back()->with('error', 'Payment proof is required.');
        }

        // Create deposit record
        $deposit = new Deposit();
        $deposit->amount = $request->amount;
        $deposit->payment_mode = $request->method;
        $deposit->status = 'Pending';
        $deposit->proof = $path;
        
        // Save tracking number if provided
        if ($request->has('tracking')) {
            $deposit->track_id = $request->tracking;
        }
        if (Auth::check()) {
            $deposit->user = Auth::user()->id;
            $user = User::find(Auth::user()->id);
        } else {
            $deposit->user = 0; // guest user
            $deposit->guest_email = $request->email;
            $deposit->guest_name = $request->name;
            
            // Create a guest user object for email notification
            $user = new \App\Models\GuestUser($request->name, $request->email);
        }
        
        $deposit->save();

        // Get settings
        $settings = Settings::where('id', '1')->first();

        // Send email notification to admin if email settings are configured
        if ($settings && $settings->contact_email) {
            try {
                // Send email notification to admin
                Mail::to($settings->contact_email)->send(new DepositNotification($deposit, $user, true));
                
                // Send confirmation to user
                Mail::to($user->email)->send(new DepositNotification($deposit, $user, false));
            } catch (\Exception $e) {
                // Log error but continue with the process
                \Log::error('Error sending deposit notification email: ' . $e->getMessage());
            }
        }

        // Get payment method name
        $payment_method_name = Wdmethod::find($request->method)->name ?? 'Bank Transfer';
        
        // Get settings for currency
        $settings = Settings::where('id', '1')->first();
        
        // Get tracking number if it exists in request or session
        $tracking_number = $request->tracking ?? session('tracking');
        
        // Clear session data
        session()->forget(['amount', 'payment_method', 'asset', 'tracking']);

        // Show receipt page
        return view('home.receipt', [
            'title' => 'Payment Receipt',
            'deposit' => $deposit,
            'payment_method_name' => $payment_method_name,
            'settings' => $settings,
            'tracking_number' => $tracking_number
        ]);
    }
}
