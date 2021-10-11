<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id');
            $table->string('type');
            $table->string('bed_room')->nullable();
            $table->string('bath_room')->nullable();
            $table->string('carpark')->nullable();
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
        Schema::dropIfExists('partations');
    }
}
