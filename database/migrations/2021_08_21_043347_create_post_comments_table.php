<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->longText('comments')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->enum('comment_status', ['on', 'off'])->default('off');
            $table->softDeletes();
            $table->timestamps();

            // $table->foreign('user_id', 'post_comment_user_id_foreign')->references('user_id')->on('users');
            // $table->foreign('post_id', 'post_comment_post_id_foreign')->references('post_id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comments');
    }
}
