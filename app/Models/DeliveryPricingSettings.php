<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryPricingSettings extends Model
{
    protected $table = 'delivery_pricing_settings';

    protected $fillable = [
        'minimum_fee', 'default_fare_when_no_rule', 'free_weight_kg', 'per_kg_rate',
        'speed_standard', 'speed_next_day', 'speed_same_day', 'speed_express',
        'enable_standard', 'enable_next_day', 'enable_same_day', 'enable_express',
    ];

    protected $casts = [
        'minimum_fee' => 'decimal:2',
        'default_fare_when_no_rule' => 'decimal:2',
        'free_weight_kg' => 'decimal:2',
        'per_kg_rate' => 'decimal:2',
        'speed_standard' => 'decimal:2',
        'speed_next_day' => 'decimal:2',
        'speed_same_day' => 'decimal:2',
        'speed_express'  => 'decimal:2',
        'enable_standard' => 'boolean',
        'enable_next_day' => 'boolean',
        'enable_same_day' => 'boolean',
        'enable_express'  => 'boolean',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }

    /** Speed options the public form should show, with their multipliers. */
    public function enabledSpeedOptions(): array
    {
        $opts = [];
        if ($this->enable_standard) $opts['Standard']  = (float) $this->speed_standard;
        if ($this->enable_next_day) $opts['Next Day']  = (float) $this->speed_next_day;
        if ($this->enable_same_day) $opts['Same Day']  = (float) $this->speed_same_day;
        if ($this->enable_express)  $opts['Express']   = (float) $this->speed_express;
        return $opts;
    }
}