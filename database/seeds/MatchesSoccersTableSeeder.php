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
        // Fase 1
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 2,
            'second_team_id'    => 3,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-14 12:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 1,
            'second_team_id'    => 4,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-15 09:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 6,
            'second_team_id'    => 5,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-15 12:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 7,
            'second_team_id'    => 8,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-15 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 11,
            'second_team_id'    => 9,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-16 07:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 13,
            'second_team_id'    => 15,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-16 10:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 12,
            'second_team_id'    => 10,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-16 13:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 14,
            'second_team_id'    => 16,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-16 16:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 18,
            'second_team_id'    => 19,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-17 09:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 21,
            'second_team_id'    => 23,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-17 12:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 17,
            'second_team_id'    => 20,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-17 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 24,
            'second_team_id'    => 22,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-18 09:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 25,
            'second_team_id'    => 27,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-18 12:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 28,
            'second_team_id'    => 26,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-18 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 29,
            'second_team_id'    => 30,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-19 09:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 1,
            'first_team_id'     => 31,
            'second_team_id'    => 32,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-19 12:00:00'
        ]);
        // Fase 2
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 2,
            'second_team_id'    => 1,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-19 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 7,
            'second_team_id'    => 6,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-20 09:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 4,
            'second_team_id'    => 3,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-20 12:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 5,
            'second_team_id'    => 8,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-20 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 10,
            'second_team_id'    => 9,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-21 09:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 11,
            'second_team_id'    => 12,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-21 12:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 13,
            'second_team_id'    => 14,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-21 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 17,
            'second_team_id'    => 18,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-22 09:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 16,
            'second_team_id'    => 15,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-22 12:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 19,
            'second_team_id'    => 20,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-22 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 25,
            'second_team_id'    => 28,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-23 09:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 22,
            'second_team_id'    => 23,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-23 12:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 21,
            'second_team_id'    => 24,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-23 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 26,
            'second_team_id'    => 27,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-24 09:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 30,
            'second_team_id'    => 32,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-24 12:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 2,
            'first_team_id'     => 31,
            'second_team_id'    => 29,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-24 15:00:00'
        ]);
        // Fase 3
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 3,
            'second_team_id'    => 1,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-25 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 4,
            'second_team_id'    => 2,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-25 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 5,
            'second_team_id'    => 7,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-25 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 8,
            'second_team_id'    => 6,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-25 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 9,
            'second_team_id'    => 12,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-26 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 10,
            'second_team_id'    => 11,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-26 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 16,
            'second_team_id'    => 13,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-26 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 15,
            'second_team_id'    => 14,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-26 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 22,
            'second_team_id'    => 21,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-27 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 23,
            'second_team_id'    => 24,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-27 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 20,
            'second_team_id'    => 18,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-27 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 19,
            'second_team_id'    => 17,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-27 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 32,
            'second_team_id'    => 29,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-28 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 30,
            'second_team_id'    => 31,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-28 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 26,
            'second_team_id'    => 25,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-28 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 3,
            'first_team_id'     => 27,
            'second_team_id'    => 28,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-28 15:00:00'
        ]);
        // Oitavas
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 4,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-30 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 4,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-06-30 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 4,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-01 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 4,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-01 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 4,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-02 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 4,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-02 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 4,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-03 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 4,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-03 15:00:00'
        ]);
        // Quartas
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 5,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-06 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 5,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-06 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 5,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-07 11:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 5,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-07 15:00:00'
        ]);
        // Semifinal
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 6,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-10 15:00:00'
        ]);
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 6,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-11 15:00:00'
        ]);
        // Terceiro
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 7,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-14 11:00:00'
        ]);
        // Final
        DB::table( 'matches_soccers' )->insert([
            'type_match_id'     => 8,
            'first_team_id'     => null,
            'second_team_id'    => null,
            'first_team_goals'  => null,
            'second_team_goals' => null,
            'match_date'        => '2018-07-15 12:00:00'
        ]);
    }
}
