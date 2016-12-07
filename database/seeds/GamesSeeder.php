<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plr = 0;
        $iD = [];
        $players = \App\Player::all();
        foreach ($players as $player) {
            $plr++;
            $iD[] = $player->id;
        }

        $weeks = \App\Week::all();
        $wks = [];
        foreach ($weeks as $week) {
            $wks[] = $week->games;
        }

        $wkId =0;
        $faker = Faker::create();
         foreach ($wks as $wk){
             $wkId++;
             $j=0;
                 for ($i = 0; $i < ($plr * $wk); $i++) {
                     if($j<$plr){
                         $j++;
                     }
                     else $j=1;
                     DB::table('games')->insert([
                         'points' => $faker->numberBetween($min = 5, $max = 40),
                         'rebounds' => $faker->numberBetween($min = 0, $max = 15),
                         'assists' => $faker->numberBetween($min = 0, $max = 15),
                         'turnovers' => $faker->numberBetween($min = 0, $max = 7),
                         'blocks' => $faker->numberBetween($min = 0, $max = 8),
                         'steals' => $faker->numberBetween($min = 0, $max = 8),
                         'field_goal' => $faker->randomFloat($nbMaxDecimals = 5, $min = 0.4, $max = 0.6),
                         'free_throws' => $faker->randomFloat($nbMaxDecimals = 5, $min = 0.5, $max = 0.95),
                         'week_id' => $wkId,
                         'player_id' => $j,
                     ]);
              }
         }

    }
}
