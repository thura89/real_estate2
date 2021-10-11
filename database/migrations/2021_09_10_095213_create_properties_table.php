<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agent_id')->nullable();
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('p_code')->nullable()->unique();
            $table->bigInteger('view_count')->nullable();
            $table->bigInteger('lat')->nullable();
            $table->bigInteger('long')->nullable();
            $table->integer('properties_type')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
