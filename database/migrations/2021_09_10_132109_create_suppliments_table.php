<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id');
            $table->string('water_sys')->nullable();
            $table->string('electricity_sys')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('suppliments');
    }
}
