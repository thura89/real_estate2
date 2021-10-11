<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_users', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('images')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('theme')->nullable();
            $table->string('verify_code')->nullable();
            $table->string('password');
            $table->string('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('login_at')->nullable();
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
        Schema::dropIfExists('developer_users');
    }
}
