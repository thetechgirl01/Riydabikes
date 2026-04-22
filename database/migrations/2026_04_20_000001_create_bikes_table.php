<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBikesTable extends Migration
{
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();            // primary image path
            $table->json('gallery')->nullable();             // array of extra image paths
            $table->decimal('price', 12, 2)->default(0);     // Selling price (NGN)
            $table->decimal('daily_rate', 12, 2)->default(0); // Rental rate per day (NGN)
            $table->integer('stock')->default(0);            // units in stock for buying
            $table->boolean('is_active')->default(true);     // show on site at all
            $table->boolean('available_for_hire')->default(true); // admin toggle for hiring
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bikes');
    }
}