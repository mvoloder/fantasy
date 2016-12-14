<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchups', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('league_id');
//            $table->foreign('league_id')->references('id')->on('users');
            $table->integer('home_user_id');
            $table->integer('away_user_id');
            $table->integer('week')->default(0);
            $table->integer('match')->default(0);
            $table->float('h_fg')->default(0);
            $table->float('h_ft')->default(0);
            $table->integer('h_pts')->default(0);
            $table->integer('h_reb')->default(0);
            $table->integer('h_ast')->default(0);
            $table->integer('h_st')->default(0);
            $table->integer('h_blk')->default(0);
            $table->integer('h_to')->default(0);
            $table->float('a_fg')->default(0);
            $table->float('a_ft')->default(0);
            $table->integer('a_pts')->default(0);
            $table->integer('a_reb')->default(0);
            $table->integer('a_ast')->default(0);
            $table->integer('a_st')->default(0);
            $table->integer('a_blk')->default(0);
            $table->integer('a_to')->default(0);
            $table->integer('home_score')->default(0);
            $table->integer('away_score')->default(0);
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
        Schema::dropIfExists('matchups');
    }
}
