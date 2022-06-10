<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturesToAreaSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('area_sizes', function (Blueprint $table) {
            $table->string('area_option')->nullable()->after('measurement');
            $table->string('width')->nullable()->after('measurement');
            $table->string('length')->nullable()->after('measurement');
            $table->string('area_size')->nullable()->after('measurement');
            $table->string('area_unit')->nullable()->after('measurement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('area_sizes', function (Blueprint $table) {
            //
        });
    }
}
