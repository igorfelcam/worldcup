<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call( UsersTableSeeder::class );
        $this->call( BetsGroupsTableSeeder::class );
        $this->call( UserBetsGroupsTableSeeder::class );
        $this->call( InvitationsTableSeeder::class );
        $this->call( TeamsTableSeeder::class );
        $this->call( TypeMatchesTableSeeder::class );
        $this->call( MatchesSoccersTableSeeder::class );
    }
}
