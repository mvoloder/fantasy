<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Run Player seeds
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 80; $i++) {
            DB::table('players')->insert([
                'first_name' => $faker->firstNameMale,
                'last_name' => $faker->lastName,
                'position' => $faker->numberBetween($min = 1, $max = 5),
                'points' => $faker->numberBetween($min = 5, $max = 40),
                'rebounds' => $faker->numberBetween($min = 0, $max = 15),
                'assists' => $faker->numberBetween($min = 0, $max = 15),
                'turnovers' => $faker->numberBetween($min = 0, $max = 7),
                'blocks' => $faker->numberBetween($min = 0, $max = 8),
                'steals' => $faker->numberBetween($min = 0, $max = 8),
                'field_goal' => $faker->randomFloat($nbMaxDecimals = 5, $min = 0.4, $max = 0.6),
                'free_throws' => $faker->randomFloat($nbMaxDecimals = 5, $min = 0.5, $max = 0.95),
            ]);
        }
    }
}
