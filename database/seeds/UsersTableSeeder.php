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
        DB::table('users')->insert([
            // 'name' => 'Igor Felipe de Camargo',
            'username' => 'igorfelcam',
            'email' => 'igorfelcam@hotmail.com',
            'password' => bcrypt('230993'),
        ]);
    }
}
