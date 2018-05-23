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

        return;
    }

}
