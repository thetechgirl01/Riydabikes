<?php

namespace App\Services;

use App\Models\Paystack;
use App\Models\SettingsCont;

class PaymentGatewayService
{
    /** Returns Paystack credentials or null if not configured. */
    public function paystack(): ?object
    {
        $row = Paystack::find(1);
        if (! $row || empty($row->paystack_secret_key) || empty($row->paystack_public_key)) {
            return null;
        }
        return (object) [
            'public_key' => $row->paystack_public_key,
            'secret_key' => $row->paystack_secret_key,
            'callback_url' => url('/payment/paystack/callback'),
        ];
    }

    /** Returns Flutterwave credentials or null if not configured. */
    public function flutterwave(): ?object
    {
        $row = SettingsCont::find(1);
        if (! $row || empty($row->flw_secret_key) || empty($row->flw_public_key)) {
            return null;
        }
        return (object) [
            'public_key'  => $row->flw_public_key,
            'secret_key'  => $row->flw_secret_key,
            'secret_hash' => $row->flw_secret_hash,
            'callback_url' => url('/payment/flutterwave/callback'),
        ];
    }

    /** Returns ['paystack' => bool, 'flutterwave' => bool] — true means key configured. */
    public function availability(): array
    {
        return [
            'paystack'    => $this->paystack() !== null,
            'flutterwave' => $this->flutterwave() !== null,
        ];
    }
}