<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'bets', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'user_id' );
            $table->integer( 'matches_soccer_id' );
            $table->integer( 'first_team_goals' )->nullable();
            $table->integer( 'second_team_goals' )->nullable();
            $table->integer( 'score' )->nullable();
            // $table->date( 'limit_date' );
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
        Schema::dropIfExists( 'bets' );
    }
}
