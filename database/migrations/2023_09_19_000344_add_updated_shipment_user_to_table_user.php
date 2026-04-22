<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedShipmentUserToTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('take_off_point')->nullable();
            $table->string('final_destination')->nullable();
            $table->string('freight_type')->nullable();
            $table->string('shipment_type')->nullable();
            $table->string('description')->nullable();
            $table->string('date_shipped')->nullable();
            $table->string('expected_delivery')->nullable();
            $table->string('location')->nullable();
            $table->string('weight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
