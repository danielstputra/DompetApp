<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('post_id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('post_title')->nullable();
            $table->string('post_description', 2048)->nullable();
            $table->string('post_image', 2048)->nullable();
            $table->boolean('is_verified')->default(false);
            $table->enum('post_status', ['on', 'off'])->default('off');
            $table->bigInteger('cat_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id', 'post_user_id_foreign')->references('user_id')->on('users');
            $table->foreign('cat_id', 'post_cat_id_foreign')->references('cat_id')->on('category_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
