<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShipmentSourceColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Where the shipment came from: 'admin' (manual entry) or 'public' (user form)
            if (!Schema::hasColumn('users', 'shipment_source')) {
                $table->string('shipment_source')->nullable()->index();
            }
            // Payment fields for public-form shipments
            if (!Schema::hasColumn('users', 'payment_method')) {
                $table->string('payment_method')->nullable();
            }
            if (!Schema::hasColumn('users', 'payment_proof')) {
                $table->string('payment_proof')->nullable();
            }
            if (!Schema::hasColumn('users', 'payment_status')) {
                $table->string('payment_status')->nullable()->default('Pending');
            }
            if (!Schema::hasColumn('users', 'package_value')) {
                $table->decimal('package_value', 12, 2)->nullable();
            }
            if (!Schema::hasColumn('users', 'package_size')) {
                $table->string('package_size')->nullable();
            }
            if (!Schema::hasColumn('users', 'delivery_notes')) {
                $table->text('delivery_notes')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'shipment_source', 'payment_method', 'payment_proof',
                'payment_status', 'package_value', 'package_size', 'delivery_notes',
            ]);
        });
    }
}