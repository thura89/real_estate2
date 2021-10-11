<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_amenities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id');
            $table->integer('elevator')->default('0');
            $table->integer('garage')->default('0');
            $table->integer('fitness_center')->default('0');
            $table->integer('security')->default('0');
            $table->integer('swimming_pool')->default('0');
            $table->integer('spa_hot_tub')->default('0');
            $table->integer('playground')->default('0');
            $table->integer('garden')->default('0');
            $table->integer('carpark')->default('0');
            $table->integer('own_transformer')->default('0');
            $table->integer('disposal')->default('0');
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
        Schema::dropIfExists('building_amenities');
    }
}
