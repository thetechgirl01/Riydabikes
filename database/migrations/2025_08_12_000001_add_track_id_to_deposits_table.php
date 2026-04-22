<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrackIdToDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deposits', function (Blueprint $table) {
            if (!Schema::hasColumn('deposits', 'track_id')) {
                $table->string('track_id')->nullable()->after('proof');
            }
            
            if (!Schema::hasColumn('deposits', 'guest_email')) {
                $table->string('guest_email')->nullable()->after('track_id');
            }
            
            if (!Schema::hasColumn('deposits', 'guest_name')) {
                $table->string('guest_name')->nullable()->after('guest_email');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deposits', function (Blueprint $table) {
            if (Schema::hasColumn('deposits', 'track_id')) {
                $table->dropColumn('track_id');
            }
            
            if (Schema::hasColumn('deposits', 'guest_email')) {
                $table->dropColumn('guest_email');
            }
            
            if (Schema::hasColumn('deposits', 'guest_name')) {
                $table->dropColumn('guest_name');
            }
        });
    }
}
