<?php

use Illuminate\Database\Seeder;

class InvitationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table( 'invitations' )->insert([
            'user_id'       => 1,
            'bets_group_id' => 2,
            'notify'        => 1
        ]);
        DB::table( 'invitations' )->insert([
            'user_id'       => 2,
            'bets_group_id' => 1,
            'notify'        => 1
        ]);
        DB::table( 'invitations' )->insert([
            'user_id'       => 1,
            'bets_group_id' => 3,
            'notify'        => 0
        ]);
        DB::table( 'invitations' )->insert([
            'user_id'       => 1,
            'bets_group_id' => 4,
            'notify'        => 0
        ]);
        DB::table( 'invitations' )->insert([
            'user_id'       => 1,
            'bets_group_id' => 3,
            'notify'        => 0
        ]);
        DB::table( 'invitations' )->insert([
            'user_id'       => 1,
            'bets_group_id' => 3,
            'notify'        => 1
        ]);
        DB::table( 'invitations' )->insert([
            'user_id'       => 1,
            'bets_group_id' => 4,
            'notify'        => 1
        ]);
    }
}
