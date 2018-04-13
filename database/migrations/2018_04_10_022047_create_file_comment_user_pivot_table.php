<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileCommentUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_comment_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_comment_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('vote');
            $table->timestamps();

            $table->foreign('file_comment_id')->references('id')->on('file_comments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_comment_user');
    }
}
