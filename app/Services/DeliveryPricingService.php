<?php

namespace App\Services;

use App\Models\DeliveryPricingRule;
use App\Models\DeliveryPricingSettings;

class DeliveryPricingService
{
    /**
     * Calculate a delivery quote.
     *
     * @return array{total: float, base_fare: float, weight_charge: float, speed: string, multiplier: float, breakdown: array, source: string}
     */
    public function quote(string $origin, string $destination, float $weightKg, string $speed): array
    {
        $settings = DeliveryPricingSettings::current();

        // 1. Base fare from rule, or fallback default
        $rule = DeliveryPricingRule::findPair($origin, $destination);
        if ($rule) {
            $baseFare = (float) $rule->base_fare;
            $source   = 'rule';
        } else {
            $baseFare = (float) $settings->default_fare_when_no_rule;
            $source   = 'default';
        }

        // 2. Weight surcharge (only above the free threshold)
        $freeKg = (float) $settings->free_weight_kg;
        $billableKg = max(0, $weightKg - $freeKg);
        $weightCharge = $billableKg * (float) $settings->per_kg_rate;

        // 3. Speed multiplier
        $multipliers = $settings->enabledSpeedOptions();
        $multiplier  = $multipliers[$speed] ?? 1.0;

        $subtotal = ($baseFare + $weightCharge) * $multiplier;

        // 4. Floor at minimum fee
        $minFee = (float) $settings->minimum_fee;
        $total = max($minFee, $subtotal);

        return [
            'total'         => round($total, 2),
            'base_fare'     => round($baseFare, 2),
            'weight_charge' => round($weightCharge, 2),
            'speed'         => $speed,
            'multiplier'    => $multiplier,
            'source'        => $source,
            'breakdown'     => [
                'origin'       => $origin,
                'destination'  => $destination,
                'weight_kg'    => $weightKg,
                'free_kg'      => $freeKg,
                'billable_kg'  => $billableKg,
                'per_kg_rate'  => (float) $settings->per_kg_rate,
                'minimum_fee'  => $minFee,
                'rule_matched' => (bool) $rule,
            ],
        ];
    }
}