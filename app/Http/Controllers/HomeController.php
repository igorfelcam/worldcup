<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        // verify if wanna look create group
        if ( $user->view_create_group ) {
            return view( 'create_bet_group' );
        }
        else {
            // select bet groups
            $bet_groups = DB::table( 'bets_groups' )
                            ->select( 'name' )
                            ->where( 'user_create_id', $user->id )
                            ->get();

            return view( 'home' )->with( 'bet_groups', $bet_groups );
        }
    }
    /*
     * set fallse in view group
    */
    public function notViewCreateGroup()
    {
        // set false in view create group
        DB::table( 'users' )
            ->where( 'id', auth()->user()->id )
            ->update([ 'view_create_group' => false ]);

        return $this->index();
    }
}
