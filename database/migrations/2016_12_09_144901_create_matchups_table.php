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
            $table->foreign('league_id')->references('id')->on('leagues');
            $table->integer('home_user_id');
            $table->integer('away_user_id');
            $table->float('fg');
            $table->float('ft');
            $table->integer('pts');
            $table->integer('reb');
            $table->integer('ast');
            $table->integer('st');
            $table->integer('blk');
            $table->integer('to');
            $table->integer('home_score');
            $table->integer('away_score');
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
