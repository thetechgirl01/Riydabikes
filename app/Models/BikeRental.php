<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeRental extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_no', 'bike_id',
        'start_date', 'end_date', 'total_days',
        'daily_rate', 'total_amount',
        'guest_name', 'guest_email', 'guest_phone', 'pickup_address',
        'payment_method', 'proof', 'status', 'admin_note', 'paid_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'daily_rate' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }

    public static function generateRentalNo(): string
    {
        return 'BR-' . now()->format('Ymd') . '-' . str_pad(random_int(1, 9999), 4, '0', STR_PAD_LEFT);
    }

    /**
     * Check if a bike has any overlapping, non-cancelled rental for the given dates.
     * Two ranges [a,b] and [c,d] overlap iff a <= d AND c <= b.
     */
    public static function hasConflict(int $bikeId, $start, $end, ?int $ignoreId = null): bool
    {
        $start = Carbon::parse($start)->toDateString();
        $end   = Carbon::parse($end)->toDateString();

        $q = static::query()
            ->where('bike_id', $bikeId)
            ->whereNotIn('status', ['Cancelled', 'Rejected'])
            ->where('start_date', '<=', $end)
            ->where('end_date', '>=', $start);

        if ($ignoreId) {
            $q->where('id', '!=', $ignoreId);
        }

        return $q->exists();
    }
}