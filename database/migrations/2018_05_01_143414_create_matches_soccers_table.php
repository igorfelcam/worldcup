<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesSoccersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'matches_soccers', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'type_match_id' );
            $table->integer( 'first_team_id' )->nullable();
            $table->integer( 'second_team_id' )->nullable();
            $table->integer( 'first_team_goals' )->nullable();
            $table->integer( 'second_team_goals' )->nullable();
            $table->dateTime( 'match_date' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'matches_soccers' );
    }
}
