<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id');
            $table->string('building_width')->nullable();
            $table->string('building_length')->nullable();
            $table->string('fence_width')->nullable();
            $table->string('fence_length')->nullable();
            $table->string('front_area')->nullable();
            $table->string('height')->nullable();
            $table->string('level')->nullable();
            $table->string('measurement')->nullable();
            $table->timestamps();
            $table->foreign('properties_id')
                  ->references('id')
                  ->on('properties')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_sizes');
    }
}
