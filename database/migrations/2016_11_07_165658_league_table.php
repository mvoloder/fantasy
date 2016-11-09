<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LeagueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('league_name');
            $table->string('league_password');
            $table->integer('number_of_teams');
            $table->integer('point_guard');
            $table->integer('shooting_guard');
            $table->integer('guard');
            $table->integer('small_forward');
            $table->integer('forward');
            $table->integer('power_forward');
            $table->integer('center');
            $table->integer('utility');
            $table->integer('bench');
            $table->string('draft_time');
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
        Schema::drop('leagues');
    }
}
