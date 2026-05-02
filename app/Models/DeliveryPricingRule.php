<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryPricingRule extends Model
{
    protected $fillable = [
        'origin_state', 'destination_state', 'base_fare', 'is_active', 'notes',
    ];

    protected $casts = [
        'base_fare' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function scopeActive($q) { return $q->where('is_active', true); }

    /** Find a rule for an origin/destination pair (case-insensitive, trimmed). */
    public static function findPair(string $origin, string $destination): ?self
    {
        return static::active()
            ->whereRaw('LOWER(TRIM(origin_state)) = ?', [strtolower(trim($origin))])
            ->whereRaw('LOWER(TRIM(destination_state)) = ?', [strtolower(trim($destination))])
            ->first();
    }
}