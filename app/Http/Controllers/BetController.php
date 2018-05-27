<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class BetController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    /*
     * put bet in database
    */
    public function create( $match_id, $team, $bet_value )
    {
        $user = auth()->user();

        // valid number
        $valid = preg_match( "/[0-9]/", $bet_value );

        if ( $valid ) {
            // verify bet date
            // date now
            date_default_timezone_set('America/Sao_Paulo');
            $date_now = date('Y-m-d H:i:s');
            // match date
            $match_date = DB::table( 'matches_soccers' )
                                ->select( 'match_date' )
                                ->where( 'id', '=', $match_id )
                                ->get();
            // checks the bet by up to one hour before
            if ( date( 'Y-m-d H:i:s', strtotime( '-60 minute', strtotime( $match_date[0]->match_date ))) > $date_now ) {
                // verify bet team
                if ( $team === 'team_first' ) {
                    $team = 'first_team_goals';
                }
                else {
                    $team = 'second_team_goals';
                }
                // verify if bet exist
                $bet_exist = DB::table( 'bets' )
                ->where([
                    [ 'user_id', '=', $user->id ],
                    [ 'matches_soccer_id', '=', $match_id ]
                ])
                ->exists();
                // if not exists
                if ( !$bet_exist ) {
                    // bet create
                    DB::table( 'bets' )
                    ->insert([
                        'user_id'           => $user->id,
                        'matches_soccer_id' => $match_id,
                        $team               => $bet_value
                    ]);
                }
                else {
                    // bet update
                    DB::table( 'bets' )
                    ->where([
                        [ 'user_id', '=', $user->id ],
                        [ 'matches_soccer_id', '=', $match_id ]
                    ])
                    ->update([ $team  => $bet_value ]);
                }
            }
        }

        return;
    }

    /*
     * view for compare bet with friend's bet
    */
    public function compareView ()
    {
        $user = auth()->user();

        $friend = 'maumau';


        return view( 'compare' );
    }

    /*
     * get friends for compare
    */
    public function search ( $name )
    {
        $user = auth()->user();

        // get friends
        $response = DB::table( 'users as us' )
                        ->select( 'us.username as name' )
                        ->where([
                            [ 'us.username', 'LIKE', '%'.$name.'%' ],
                            [ 'us.id', '<>', $user->id ]
                        ])
                        ->orderBy('us.username', 'asc')
                        ->paginate( 50 );

        return response()->json([
            'friends'       => $response,
            'user'          => $user
        ]);
    }

    /*
     * get compare bet with friend's bet
    */
    public function getCompare ( $friend )
    {
        $user = auth()->user();

        // get comparation
        $response = DB::table( 'matches_soccers as mat' )
                        ->select(
                            'typ.name as tipo',
                            'tea.nickname as teama',
                            'tea.url_flag as flaga',
                            'mat.first_team_goals as goalsa',
                            'teb.nickname as teamb',
                            'teb.url_flag as flagb',
                            'mat.second_team_goals as goalsb',
                            'usa.username as usera',
                            'bea.first_team_goals as betaa',
                            'bea.second_team_goals as betba',
                            'usb.username as userb',
                            'beb.first_team_goals as betab',
                            'beb.second_team_goals as betbb'
                        )
                        ->join( 'type_matches as typ', 'mat.type_match_id', '=', 'typ.id' )
                        ->join( 'teams as tea', 'mat.first_team_id', '=', 'tea.id' )
                        ->join( 'teams as teb', 'mat.second_team_id', '=', 'teb.id' )
                        ->leftJoin( 'users as usa', 'usa.id', '=', DB::raw( $user->id ))
                        ->leftJoin( 'users as usb', 'usb.username', '=', DB::raw( '"'.$friend.'"' ))
                        ->leftJoin( 'bets as bea', function( $join ){
                            $join->on( 'mat.id', '=', 'bea.matches_soccer_id' );
                            $join->on( 'bea.user_id', '=', 'usa.id' );
                        })
                        ->leftJoin( 'bets as beb', function( $join ){
                            $join->on( 'mat.id', '=', 'beb.matches_soccer_id' );
                            $join->on( 'beb.user_id', '=', 'usb.id' );
                        })
                        ->orderBy('mat.match_date', 'asc')
                        ->get();

        return response()->json([
            'friends'   => $response,
            'user'      => $user
        ]);

    }
}
