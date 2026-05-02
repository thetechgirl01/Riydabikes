<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryPricingTables extends Migration
{
    public function up()
    {
        // Per-state-pair base fares. e.g. Lagos -> Abuja: ₦8,500
        Schema::create('delivery_pricing_rules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('origin_state', 100);
            $table->string('destination_state', 100);
            $table->decimal('base_fare', 12, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['origin_state', 'destination_state'], 'delivery_pricing_pair_unique');
            $table->index('is_active');
        });

        // Single-row settings table for global pricing knobs
        Schema::create('delivery_pricing_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('minimum_fee', 12, 2)->default(1500);
            $table->decimal('default_fare_when_no_rule', 12, 2)->default(5000);
            $table->decimal('free_weight_kg', 8, 2)->default(2);
            $table->decimal('per_kg_rate', 12, 2)->default(300);
            // Speed multipliers (decimal so 1.0 = standard, 2.0 = 2x)
            $table->decimal('speed_standard', 6, 2)->default(1.00);
            $table->decimal('speed_next_day', 6, 2)->default(1.30);
            $table->decimal('speed_same_day', 6, 2)->default(1.60);
            $table->decimal('speed_express',  6, 2)->default(2.00);
            $table->boolean('enable_standard')->default(true);
            $table->boolean('enable_next_day')->default(true);
            $table->boolean('enable_same_day')->default(true);
            $table->boolean('enable_express')->default(true);
            $table->timestamps();
        });

        // Insert the single settings row
        \DB::table('delivery_pricing_settings')->insert([
            'minimum_fee' => 1500,
            'default_fare_when_no_rule' => 5000,
            'free_weight_kg' => 2,
            'per_kg_rate' => 300,
            'speed_standard' => 1.00,
            'speed_next_day' => 1.30,
            'speed_same_day' => 1.60,
            'speed_express'  => 2.00,
            'enable_standard' => true,
            'enable_next_day' => true,
            'enable_same_day' => true,
            'enable_express'  => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Nigeria-relevant starter pricing rules.
        // These are sane defaults the admin will tweak in the UI.
        $rules = [
            // Within-Lagos
            ['Lagos', 'Lagos', 2000],
            // Lagos to major hubs
            ['Lagos', 'Abuja', 8500],
            ['Lagos', 'Port Harcourt', 9000],
            ['Lagos', 'Ibadan', 3500],
            ['Lagos', 'Kano', 11000],
            ['Lagos', 'Benin City', 5500],
            ['Lagos', 'Enugu', 8000],
            // Abuja
            ['Abuja', 'Abuja', 2500],
            ['Abuja', 'Lagos', 8500],
            ['Abuja', 'Kano', 6000],
            ['Abuja', 'Port Harcourt', 9500],
            ['Abuja', 'Kaduna', 4000],
            // Port Harcourt
            ['Port Harcourt', 'Port Harcourt', 2000],
            ['Port Harcourt', 'Lagos', 9000],
            ['Port Harcourt', 'Abuja', 9500],
            ['Port Harcourt', 'Aba', 2500],
            ['Port Harcourt', 'Owerri', 3000],
            ['Port Harcourt', 'Uyo', 3500],
        ];

        $now = now();
        foreach ($rules as [$origin, $destination, $fare]) {
            \DB::table('delivery_pricing_rules')->insert([
                'origin_state' => $origin,
                'destination_state' => $destination,
                'base_fare' => $fare,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('delivery_pricing_rules');
        Schema::dropIfExists('delivery_pricing_settings');
    }
}