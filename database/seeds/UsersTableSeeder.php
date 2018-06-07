<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table( 'users' )->insert([
            'username'  => 'igorfelcam',
            'email'     => 'igorfelcam@hotmail.com',
            'password'  => bcrypt('230993')
        ]);
        // DB::table( 'users' )->insert([
        //     'username'  => 'maumau',
        //     'email'     => 'maumau@hotmail.com',
        //     'password'  => bcrypt('123456')
        // ]);
    }
}
