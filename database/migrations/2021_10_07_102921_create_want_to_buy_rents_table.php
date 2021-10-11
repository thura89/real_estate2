<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWantToBuyRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('want_to_buy_rents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agent_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('developer_id')->nullable();
            $table->string('title')->nullable();
            $table->integer('budget_from')->nullable();
            $table->integer('budget_to')->nullable();
            $table->string('currency_code')->nullable();
            $table->integer('area_unit')->nullable();
            $table->integer('area_width')->nullable();
            $table->integer('area_length')->nullable();
            $table->integer('floor_level')->nullable();
            $table->integer('completion')->nullable();
            $table->integer('furnished_status')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('region')->nullable();
            $table->string('township')->nullable();
            $table->integer('properties_type')->nullable();
            $table->integer('properties_category')->nullable();
            $table->string('descriptions')->nullable();
            $table->string('co_broke')->nullable();
            $table->integer('terms_condition')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('want_to_buy_rents');
    }
}
