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

            $matches_soccers = DB::table( 'matches_soccers as mat' )
                                    ->select(
                                        'typ.id as type_id',
                                        'typ.name as type_name',
                                        'mat.first_team_id as team_a_id',
                                        'tea.url_flag as flag_a',
                                        'tea.nickname as team_a',
                                        'mat.second_team_id as team_b_id',
                                        'teb.url_flag as flag_b',
                                        'teb.nickname as team_b',
                                        // 'mat.match_date as match_date'
                                        DB::raw( 'date_format( mat.match_date, "%d/%m/%Y - %H:%i" ) as match_date' )
                                    )
                                    ->join( 'type_matches as typ', 'mat.type_match_id', '=', 'typ.id' )
                                    ->join( 'teams as tea', 'mat.first_team_id', '=', 'tea.id' )
                                    ->join( 'teams as teb', 'mat.second_team_id', '=', 'teb.id' )
                                    ->orderBy( 'mat.match_date', 'asc' )
                                    ->get();

            return view( 'home' )->with([ 'bet_groups' => $bet_groups, 'matches_soccers' => $matches_soccers ]);
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
