<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NotificationController extends Controller
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
     * page notifications
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;

        // verify exist user's bet groups
        $exist_bet_groups = DB::table( 'bets_groups' )
                                ->select( 'name' )
                                ->where( 'user_create_id', $user_id )
                                ->exists();
        if ( $exist_bet_groups ) {
            // get user's bet groups
            $bet_groups = DB::table( 'bets_groups' )
                            ->select( 'name' )
                            ->where( 'user_create_id', $user_id )
                            ->get();
        }
        else {
            $bet_groups = null;
        }

        // get detaisl notifications
        $details_notifications = $this->details_notifications( $user_id );

        return view( 'notifications' )->with([
                                    'bet_groups'            => $bet_groups,
                                    'details_notifications' => $details_notifications
                                ]);
    }

    public function details_notifications( $user_id ) {
        // get detaisl notifications
        $details_notifications = DB::table( 'invitations as inv' )
                                ->select(
                                    'inv.id as inv_id',
                                    'usr.id as user_id',
                                    'usr.username as username',
                                    'btg.id as group_id',
                                    'btg.name as group_name'
                                )
                                ->join( 'bets_groups as btg', 'inv.bets_group_id', '=', 'btg.id' )
                                ->join( 'users as usr', 'inv.user_id', '=', 'usr.id' )
                                ->where([
                                    [ 'inv.notify', '=', '1' ],
                                    [ 'btg.user_create_id', '=', $user_id ]
                                ])
                                ->get();

        return json_encode( $details_notifications );
    }

    /**
     * Notifications acept
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function acept( $inv_id, $group_id, $user_id )
    {
        $user_log = auth()->user()->id;

        $exist = DB::table( 'user_bets_groups' )
                        ->where([
                                [ 'user_id', $user_id ],
                                [ 'bets_group_id', $group_id ]
                            ])
                        ->exists();

        if ( !$exist ) {
            DB::table( 'user_bets_groups' )
            ->insert([
                'user_id'       => $user_id,
                'bets_group_id' => $group_id
            ]);
        }

        DB::table( 'invitations' )
            ->where( 'id', $inv_id )
            ->update([ 'notify' => 0 ]);

        // get detaisl notifications
        $details_notifications = $this->details_notifications( $user_log );

        return $details_notifications;
    }

    /**
     * Notification not acept
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recused( $inv_id )
    {
        $user_log = auth()->user()->id;

        DB::table( 'invitations' )
            ->where( 'id', $inv_id )
            ->update([ 'notify' => 0 ]);

        // get detaisl notifications
        $details_notifications = $this->details_notifications( $user_log );

        return $details_notifications;
    }
}
