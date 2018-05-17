<?php

use Illuminate\Database\Seeder;

class BetsGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table( 'bets_groups' )->insert([
            'user_create_id'    => 1,
            'name'              => 'Grupo Amigos'
        ]);
        DB::table( 'bets_groups' )->insert([
            'user_create_id'    => 2,
            'name'              => 'Amigos do Maumau'
        ]);
        DB::table( 'bets_groups' )->insert([
            'user_create_id'    => 2,
            'name'              => 'Outros Amigos do Maumau'
        ]);
        DB::table( 'bets_groups' )->insert([
            'user_create_id'    => 2,
            'name'              => 'Epa Amigos'
        ]);
    }
}
