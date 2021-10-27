<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('member_card');
            $table->string('username');
            $table->string('password');
            $table->string('fullname');
            $table->longText('home_address')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('email')->unique();
            $table->boolean('is_verified')->default(false);
            $table->string('user_image', 2048)->nullable();
            $table->enum('user_level', ['member', 'administrator'])->default('member');
            $table->enum('user_online', ['offline', 'online'])->default('offline');
            $table->enum('user_status', ['pending', 'suspend', 'active'])->default('pending');
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
