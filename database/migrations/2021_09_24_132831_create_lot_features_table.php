<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lot_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id');
            $table->integer('cornet_lot')->default('0');
            $table->integer('garden')->default('0');
            $table->integer('lake')->default('0');
            $table->integer('mountain')->default('0');
            $table->integer('river')->default('0');
            $table->integer('pool')->default('0');
            $table->integer('sea')->default('0');
            $table->integer('city')->default('0');
            $table->integer('pagoda')->default('0');
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
        Schema::dropIfExists('lot_features');
    }
}
