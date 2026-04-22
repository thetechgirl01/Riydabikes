<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikeRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('bike_rentals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rental_no')->unique();           // e.g. BR-20260420-4821
            $table->unsignedBigInteger('bike_id');

            // Booking period
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_days');
            $table->decimal('daily_rate', 12, 2);            // snapshot at booking time
            $table->decimal('total_amount', 12, 2);

            // Guest customer details
            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_phone')->nullable();
            $table->text('pickup_address')->nullable();

            // Payment
            $table->string('payment_method')->nullable();
            $table->string('proof')->nullable();
            $table->string('status')->default('Pending');    // Pending | Approved | Active | Completed | Cancelled | Rejected
            $table->text('admin_note')->nullable();
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            $table->foreign('bike_id')->references('id')->on('bikes')->onDelete('restrict');
            $table->index(['bike_id', 'start_date', 'end_date']);
            $table->index('status');
            $table->index('guest_email');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bike_rentals');
    }
}