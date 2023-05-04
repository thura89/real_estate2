<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtrafieldToWantToBuyRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('want_to_buy_rents', function (Blueprint $table) {
            $table->string('area_size')->nullable()->after('area_length');
            $table->string('bed_room')->nullable()->after('descriptions');
            $table->string('bath_room')->nullable()->after('descriptions');
            $table->string('situations')->nullable()->after('descriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('want_to_buy_rents', function (Blueprint $table) {
            $table->dropColumn(['area_size', 'bed_room', 'bath_room', 'situations']);
        });
    }
}
