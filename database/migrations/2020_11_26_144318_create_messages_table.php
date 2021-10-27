<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('message_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('receiver')->unsigned();
            $table->longText('message')->nullable();
            $table->boolean('is_seen')->default(0);
            $table->timestamps();

            $table->foreign('user_id', 'message_user_id_foreign')->references('user_id')->on('users');
            $table->foreign('receiver', 'message_receiver_foreign')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
