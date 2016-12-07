<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Players extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function(Blueprint $table){
            $table->increments('id');
//            $table->integer('user_id')->nullable();
//            $table->integer('league_id')->nullable();
//            $table->integer('team_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('position');
            $table->integer('points');
            $table->integer('rebounds');
            $table->integer('assists');
            $table->integer('turnovers');
            $table->integer('blocks');
            $table->integer('steals');
            $table->float('field_goal');
            $table->float('free_throws');
            $table->integer('week_id');
            $table->integer('game_id');
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
        Schema::drop('players');
    }
}
