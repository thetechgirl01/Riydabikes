<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikePurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no', 'bike_id', 'quantity', 'unit_price', 'total_amount',
        'guest_name', 'guest_email', 'guest_phone',
        'shipping_address', 'city', 'state',
        'payment_method', 'proof', 'status', 'admin_note', 'paid_at',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }

    public static function generateOrderNo(): string
    {
        // BP-YYYYMMDD-XXXX (random suffix to avoid collisions)
        return 'BP-' . now()->format('Ymd') . '-' . str_pad(random_int(1, 9999), 4, '0', STR_PAD_LEFT);
    }
}