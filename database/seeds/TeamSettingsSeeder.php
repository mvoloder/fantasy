<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class TeamSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 4; $i++){
            DB::table('team_settings')->insert([
                'team_name' => $faker->word,
                'user_id' => $i,
                'league_id' => '1',
            ]);
        }

    }
}
