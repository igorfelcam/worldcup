<?php

use Illuminate\Database\Seeder;

class TypeMatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table( 'type_matches' )->insert([
            'name'  => 'Fase 1'
        ]);
        DB::table( 'type_matches' )->insert([
            'name'  => 'Fase 2'
        ]);
        DB::table( 'type_matches' )->insert([
            'name'  => 'Fase 3'
        ]);
        DB::table( 'type_matches' )->insert([
            'name'  => 'Oitavas de final'
        ]);
        DB::table( 'type_matches' )->insert([
            'name'  => 'Quartas de final'
        ]);
        DB::table( 'type_matches' )->insert([
            'name'  => 'Semifinal'
        ]);
        DB::table( 'type_matches' )->insert([
            'name'  => 'Terceiro lugar'
        ]);
        DB::table( 'type_matches' )->insert([
            'name'  => 'Final'
        ]);
    }
}
