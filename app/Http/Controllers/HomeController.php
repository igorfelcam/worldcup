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

        // verify if have a bet group
        $exist_bet_group = DB::table( 'bets_groups' )
                                ->where( 'user_create_id', '=', $user->id )
                                ->exists();

        // if have bet group
        if ( $exist_bet_group ) {
            // select bet groups
            $bet_groups = DB::table( 'bets_groups' )
                            ->select( 'name' )
                            ->where( 'user_create_id', $user->id )
                            ->get();

            return view( 'home' )->with( 'bet_groups', $bet_groups );
        }
        else {
            return view( 'create_bet_group' );
        }
    }
}
