<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'invitations', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'user_id' );
            $table->integer( 'bets_group_id' );
            $table->boolean( 'notify' );
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
        Schema::dropIfExists( 'invitations' );
    }
}
