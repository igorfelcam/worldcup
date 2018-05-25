<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BetController extends Controller
{
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
}
