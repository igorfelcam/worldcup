<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
            /*
             * COLOCAR NA MESMA TELA OS JOGOS QUE FOREM ACONTECENDO
            */

            // verify exist user's bet groups
            $exist_bet_groups = DB::table( 'bets_groups' )
                                    ->select( 'name' )
                                    ->where( 'user_create_id', $user->id )
                                    ->exists();
            if ( $exist_bet_groups ) {
                // get user's bet groups
                $bet_groups = DB::table( 'bets_groups' )
                                ->select( 'name' )
                                ->where( 'user_create_id', $user->id )
                                ->get();
            }
            else {
                $bet_groups = null;
            }

            // get notifications
            $notifications = DB::table( 'invitations as inv' )
                                    ->join( 'bets_groups as btg', 'inv.bets_group_id', '=', 'btg.id' )
                                    ->where([
                                        [ 'inv.notify', '=', '1' ],
                                        [ 'btg.user_create_id', '=', $user->id ]
                                    ])
                                    ->count();

            // matches soccers
            $matches_soccers = DB::table( 'matches_soccers as mat' )
                                    ->select(
                                        'mat.id as match_id',
                                        'typ.id as type_id',
                                        'typ.name as type_name',
                                        'mat.first_team_id as team_a_id',
                                        'tea.url_flag as flag_a',
                                        'tea.nickname as team_a',
                                        'mat.first_team_goals as a_first_team_goals',
                                        'mat.second_team_id as team_b_id',
                                        'teb.url_flag as flag_b',
                                        'teb.nickname as team_b',
                                        'mat.second_team_goals as b_second_team_goals',
                                        DB::raw( 'date_format( mat.match_date, "%d/%m/%Y - %H:%i" ) as match_date' ),
                                        'bet.first_team_goals as bet_first_team_goals',
                                    	'bet.second_team_goals as bet_second_team_goals',
                                    	'bet.score as score'
                                    )
                                    ->join( 'type_matches as typ', 'mat.type_match_id', '=', 'typ.id' )
                                    ->join( 'teams as tea', 'mat.first_team_id', '=', 'tea.id' )
                                    ->join( 'teams as teb', 'mat.second_team_id', '=', 'teb.id' )
                                    ->leftJoin( 'bets as bet', function( $join ){
                                        $join->on( 'mat.id', '=', 'bet.matches_soccer_id' );
                                        $join->on( 'bet.user_id', '=', DB::raw( Auth::user()->id ) );
                                    })
                                    ->orderBy( 'mat.match_date', 'asc' )
                                    ->get();

            // // get total score user
            $total_score = DB::table( 'users' )
                                ->select( 'total_score' )
                                ->where( 'id', '=', $user->id )
                                ->get();

            return view( 'home' )->with([
                                    'bet_groups'        => $bet_groups,
                                    'matches_soccers'   => $matches_soccers,
                                    'total_score'       => $total_score[0]->total_score,
                                    'notifications'     => $notifications
                                ]);
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

        return redirect()->route('home');
    }

    /*
     * set fallse in view group
    */
    public function pageInformation()
    {
        $top_five = DB::table( 'users as usr' )
                        ->select(
                            'usr.username as user_name',
                            'usr.total_score as total_score',
                            DB::raw( 'case when a.hit_the_mark is null then 0 else a.hit_the_mark end as hit_the_mark' ),
                            DB::raw( 'case when b.almost_hit is null then 0 else b.almost_hit end as almost_hit' )
                            )
                            ->leftJoin( DB::raw(
                                        '(select
                                        htm.user_id as user_id,
                                        count(*) as hit_the_mark
                                        from bets as htm
                                        where htm.score = 3
                                        group by htm.user_id) as a'
                                    ),
                                    function( $join )
                                    {
                                        $join->on( 'usr.id', '=', 'a.user_id' );
                                    }
                                )
                            ->leftJoin( DB::raw(
                                        '(select
                                        alh.user_id as user_id,
                                        count(*) as almost_hit
                                        from bets as alh
                                        where alh.score = 1
                                        group by alh.user_id) as b'
                                    ),
                                    function( $join )
                                    {
                                        $join->on(  'usr.id', '=', 'b.user_id' );
                                    }
                                )
                            ->orderBy( 'usr.total_score', 'desc' )
                            ->orderBy( 'a.hit_the_mark', 'desc' )
                            ->orderBy( 'b.almost_hit', 'desc' )
                            ->limit( 5 )
                            ->get();

        return view('information')->with( 'top_five', $top_five );
    }
}
