<?php

use Illuminate\Database\Seeder;

class MatchesSoccersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('matches_soccers')->insert([
            'first_team_id' => 1,
            'second_team_id' => 2,
            'first_team_goals' => 0,
            'second_team_goals' => 0,
            'match_date' => '2018/06/01', // **********
        ]);
    }
}
