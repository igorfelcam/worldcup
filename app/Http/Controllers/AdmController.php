<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class AdmController extends Controller
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
     * Update matches results
     */
     public function index()
    {
        $user = auth()->user();

        if (( $user->id == 1 ) && ( $user->username == 'igorfelcam' )) {

            // matches soccers
            $matches_soccers = DB::table( 'matches_soccers as mat' )
                                    ->select(
                                        'mat.id as match_id',
                                        'typ.id as type_id',
                                        'typ.name as type_name',
                                        'mat.first_team_id as team_a_id',
                                        'tea.url_flag as flag_a',
                                        'tea.nickname as team_a',
                                        'mat.second_team_id as team_b_id',
                                        'teb.url_flag as flag_b',
                                        'teb.nickname as team_b',
                                        DB::raw( 'date_format( mat.match_date, "%d/%m/%Y - %H:%i" ) as match_date' ),
                                        'mat.first_team_goals as bet_first_team_goals',
                                        'mat.second_team_goals as bet_second_team_goals'
                                    )
                                    ->join( 'type_matches as typ', 'mat.type_match_id', '=', 'typ.id' )
                                    ->join( 'teams as tea', 'mat.first_team_id', '=', 'tea.id' )
                                    ->join( 'teams as teb', 'mat.second_team_id', '=', 'teb.id' )
                                    ->orderBy( 'mat.match_date', 'asc' )
                                    ->get();

            // $matches = DB::table( 'matches_soccers' );

            return view( 'adm_matches' )->with([
                                    'matches_soccers' => $matches_soccers,
                                ]);
        }
        else {
            return redirect()->route('home');
        }

    }

    /**
     * Update matches results
     */
    // public function results( $id_match, $first_goal, $second_goal )
    public function results( Request $request )
    {
        $user = auth()->user();

        if (( $user->id == 1 ) && ( $user->username == 'igorfelcam' )) {

            $match_id = $request->input( 'match_id' );
            $match_date = $request->input( 'match_date' );
            $team_first = $request->input( 'team_first' );
            $team_second = $request->input( 'team_second' );

            date_default_timezone_set( 'America/Sao_Paulo' );
            $date_now = date( 'Y-m-d H:i:s' );

            $valid_first = preg_match( "/^[0-9]+$/", $team_first );
            $valid_second = preg_match( "/^[0-9]+$/", $team_second );

            $match_date = DB::table( 'matches_soccers' )
                                ->select( 'match_date' )
                                ->where( 'id', '=', $match_id )
                                ->get();

            $match_date = $match_date[0]->match_date;

            if ( $team_first != null && $team_second != null ) {
                if (
                    ( $match_id != null ) &&
                    ( $match_date > $date_now ) && // TROCAR O SINAL AQUI Ó
                    ( $valid_first || $team_first == null ) &&
                    ( $valid_second || $team_second == null )
                ) {
                    echo "here";
                    if ( $team_first == null ) {
                        $team_first = 0;
                    }
                    elseif ( $team_second == null ) {
                        $team_second = 0;
                    }
                    elseif ( $team_first != null ) {
                        $team_first = (String) $team_first;
                    }
                    elseif ( $team_second != null ) {
                        $team_second = (String) $team_second;
                    }

                    DB::table( 'matches_soccers' )
                    ->where( 'id', $match_id )
                    ->update([
                        'first_team_goals'   => (String) $team_first,
                        'second_team_goals'  => (String) $team_second
                    ]);
                }
            }
        }
        return redirect()->route('matches');
    }
}
