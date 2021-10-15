<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('developer_id')->nullable();
            $table->string('region')->nullable();
            $table->string('township')->nullable();
            $table->string('townsandvillages')->nullable();
            $table->string('wards')->nullable();
            $table->string('street_name')->nullable();
            $table->string('type_of_street')->nullable();
            $table->string('currency_code')->nullable();
            $table->integer('area_unit')->nullable();
            $table->integer('min_price')->nullable();
            $table->integer('max_price')->nullable();
            $table->integer('purchase_type')->nullable();
            $table->integer('installment')->nullable();
            $table->integer('new_project_sale_type')->nullable();
            $table->integer('preparation')->nullable();
            $table->timestamp('project_start_at')->nullable();
            $table->timestamp('project_end_at')->nullable();
            $table->longText('about_project')->nullable();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_projects');
    }
}
