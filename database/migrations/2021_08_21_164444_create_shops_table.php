<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('shop_id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('shop_name')->nullable();
            $table->string('doctor_name')->nullable();
            $table->string('shop_address', 2048)->nullable();
            $table->string('shop_description', 2048)->nullable();
            $table->string('shop_image', 2048)->nullable();
            $table->enum('shop_online', ['offline', 'online'])->default('offline');
            $table->enum('shop_status', ['off', 'on'])->default('off');
            $table->boolean('is_verified')->default(false);
            $table->string('shop_url_facebook')->nullable();
            $table->string('shop_url_twitter')->nullable();
            $table->string('shop_url_instagram')->nullable();
            $table->string('shop_url_site')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id', 'shop_user_id_foreign')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
