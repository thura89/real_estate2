<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewCountToWantToBuyRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('want_to_buy_rents', function (Blueprint $table) {
            $table->string('view_count')->nullable()->after('terms_condition');
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
            $table->dropColumn('view_count');
        });
    }
}
