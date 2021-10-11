<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_amenities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id');
            $table->integer('refrigerator')->default('0');
            $table->integer('washing_machine')->default('0');
            $table->integer('mirowave')->default('0');
            $table->integer('gas_or_electric_stove')->default('0');
            $table->integer('air_conditioning')->default('0');
            $table->integer('tv')->default('0');
            $table->integer('cable_satellite')->default('0');
            $table->integer('internet_wifi')->default('0');
            $table->integer('water_heater')->default('0');
            $table->integer('security_cctv')->default('0');
            $table->integer('fire_alarm')->default('0');
            $table->integer('dinning_table')->default('0');
            $table->integer('bed')->default('0');
            $table->integer('sofa_chair')->default('0');
            $table->integer('private_swimming_pool')->default('0');
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
        Schema::dropIfExists('unit_amenities');
    }
}
