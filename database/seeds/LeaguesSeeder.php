<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LeaguesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Faker::create();
//
//        for ($i = 0; $i <= 1; $i++){
//            DB::table('leagues')->insert([
//               'id' => $faker->numberBetween($min = 0, $max = 2),
//                'user_id' => $faker->numberBetween($min = 0, $max = 2),
//                'league_name' => $faker->word,
//                'league_password' => $faker->word,
//                'number_of_teams' => $faker->numberBetween($min = 3, $max = 5),
//                'roster' => $faker->numberBetween($min = 9, $max = 21),
//
//            ]);
//
//        }
    }
}
