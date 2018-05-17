<?php

use Illuminate\Database\Seeder;

class UserBetsGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table( 'user_bets_groups' )->insert([
            'user_id'       => 1,
            'bets_group_id' => 1
        ]);
        DB::table( 'user_bets_groups' )->insert([
            'user_id'       => 2,
            'bets_group_id' => 2
        ]);
        DB::table( 'user_bets_groups' )->insert([
            'user_id'       => 2,
            'bets_group_id' => 3
        ]);
        DB::table( 'user_bets_groups' )->insert([
            'user_id'       => 2,
            'bets_group_id' => 4
        ]);
    }
}
