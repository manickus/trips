<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->timestamps();
        });

             Schema::table('comment_replies', function (Blueprint $table) {
          $table->integer('user_id')->unsigned(); 
          $table->foreign('user_id')
            ->references('id')
            ->on('users');
          

          $table->integer('comment_id')->unsigned(); 
          $table->foreign('comment_id')
            ->references('id')
            ->on('comments')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_replies');
    }
}
