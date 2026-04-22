<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikePurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('bike_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_no')->unique();            // e.g. BP-20260420-4821
            $table->unsignedBigInteger('bike_id');
            $table->integer('quantity')->default(1);
            $table->decimal('unit_price', 12, 2);            // snapshot: price at time of order
            $table->decimal('total_amount', 12, 2);

            // Guest customer details (no login flow)
            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_phone')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();

            // Payment
            $table->string('payment_method')->nullable();    // same pattern as deposits
            $table->string('proof')->nullable();             // uploaded proof image path
            $table->string('status')->default('Pending');    // Pending | Approved | Rejected | Cancelled
            $table->text('admin_note')->nullable();
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            $table->foreign('bike_id')->references('id')->on('bikes')->onDelete('restrict');
            $table->index('status');
            $table->index('guest_email');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bike_purchases');
    }
}