<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properties_id');
            $table->integer('price');
            $table->integer('area')->nullable();
            $table->integer('price_by_area')->nullable();
            $table->string('currency_code')->nullable();
            $table->integer('minimum_month')->nullable();
            $table->integer('rent_pay_type')->nullable();
            $table->integer('rent_payby_daily')->nullable();
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
        Schema::dropIfExists('rent_prices');
    }
}
