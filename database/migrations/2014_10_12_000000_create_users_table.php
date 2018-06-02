<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'users', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'username' )->unique();
            $table->string( 'email' )->unique();
            $table->string( 'password' );
            $table->boolean( 'view_create_group' )->default( true );
            $table->integer( 'total_score' )->default( 0 );
            $table->rememberToken();
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
        Schema::dropIfExists( 'users' );
    }
}
