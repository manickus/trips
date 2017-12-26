<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id');
            $table->string('model');
            $table->integer('value');
            $table->timestamps();
        });



        Schema::table('votes', function (Blueprint $table) {
          $table->integer('user_id')->unsigned(); 
          $table->foreign('user_id')
            ->references('id')
            ->on('users');
          
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
