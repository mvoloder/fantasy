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
            $table->float('fg')->default(0);
            $table->float('ft')->default(0);
            $table->integer('pts')->default(0);
            $table->integer('reb')->default(0);
            $table->integer('ast')->default(0);
            $table->integer('st')->default(0);
            $table->integer('blk')->default(0);
            $table->integer('to')->default(0);
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
