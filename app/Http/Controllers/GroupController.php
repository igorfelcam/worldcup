<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // redirect the page create bet group
        return view( 'create_bet_group' );
    }

    /**
     * Create bets group
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        //
        $user = auth()->user();
        $name_bet_group = $request->input( 'namegroup' );

        $bet_group = DB::table( 'bets_groups' )
                        ->where([
                            [ 'user_create_id', '=', $user->id ],
                            [ 'name', '=', $name_bet_group ]
                        ])
                        ->exists();
        // if not exists
        if ( !$bet_group ) {
            // insert new group
            DB::table( 'bets_groups' )
                ->insert([
                    'user_create_id'    => $user->id,
                    'name'              => $name_bet_group
                ]);
            // relationship to betting groups created with the creator user
            $bet_group_id = DB::table( 'bets_groups' )
                                ->select( 'id' )
                                ->where([
                                    [ 'user_create_id', '=', $user->id ],
                                    [ 'name', '=', $name_bet_group ]
                                ])
                                ->get();
            // inserts relationship
            DB::table( 'user_bets_groups' )
                ->insert([
                    'user_id'       => $user->id,
                    'bets_group_id' => $bet_group_id[0]->id
                ]);
        }
        // select bet groups
        $bet_groups = DB::table( 'bets_groups' )
                        ->select( 'name' )
                        ->where( 'user_create_id', $user->id )
                        ->get();

        return view( 'home' )->with( 'bet_groups', $bet_groups );
    }


    /*
     * open page search bet group
    */
    public function searchPage()
    {
        // redirect the page search bet group
        return view( 'search_bet_group' );
    }

    /**
     * search bets group
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search( $name )
    {
        $user = auth()->user();

        // get bet group searched
        $response = DB::table( 'bets_groups as bg' )
                        ->select(
                            'bg.id as group_id',
                            'bg.name as group_name',
                            'bg.user_create_id as user_create',
                            DB::raw( 'case when ubg.bets_group_id = bg.id then 1 else 0 end as  user_participe' ),
                            DB::raw( 'case when inv.bets_group_id = bg.id then 1 else 0 end as user_invite' )
                        )
                        ->leftJoin( 'user_bets_groups as ubg', function( $join ){
                            $join->on( 'ubg.bets_group_id', '=', 'bg.id' );
                            $join->on( 'ubg.user_id', '=', DB::raw( Auth::user()->id ) );
                        })
                        ->leftJoin( 'invitations as inv', function( $join ){
                            $join->on( 'inv.bets_group_id', '=', 'bg.id' );
                            $join->on( 'inv.user_id', '=', DB::raw( Auth::user()->id ) );
                            $join->on( 'inv.notify', '=', DB::raw( '1' ) );
                        })
                        ->where( 'bg.name', 'LIKE', '%'.$name.'%' )
                        ->paginate( 50 );

        return response()->json([
            'groups'        => $response,
            'user'          => $user
        ]);

    }

    /*
     * ask invite
    */
    public function enterGroup( $group_id, $user_id )
    {
        // valid user
        $auth = auth()->id();
        if ( $user_id == $auth ) {
            // verify if user already sent invitation
            $exist = DB::table( 'invitations' )
                            ->where([
                                [ 'user_id', '=', $user_id ],
                                [ 'bets_group_id', '=', $group_id ],
                                [ 'notify', '=', true ]
                            ])
                            ->exists();
            if ( !$exist ) {
                // inser invit for user auth
                DB::table( 'invitations' )
                    ->insert([
                        'user_id' => auth()->id(), 'bets_group_id' => $group_id, 'notify' => true
                    ]);
            }
        }
        return;
    }

    /*
     * exit group
    */
    public function exitGroup( $group_id, $user_id )
    {
        // valid user
        $auth = auth()->id();
        if ( $user_id == $auth ) {
        //     // verify if user already sent invitation
            $exist = DB::table( 'user_bets_groups as ubg' )
                            ->where([
                                [ 'ubg.user_id', '=', $user_id ],
                                [ 'ubg.bets_group_id', '=', $group_id ],
                                [ 'bg.user_create_id', '<>', $user_id ]
                            ])
                            ->join( 'bets_groups as bg', 'ubg.bets_group_id', '=', 'bg.id' )
                            ->exists();
            if ( $exist ) {
                // delete invit for user auth
                DB::table( 'user_bets_groups' )
                            ->where([
                                [ 'user_id', '=', $user_id ],
                                [ 'bets_group_id', '=', $group_id ]
                            ])
                            ->delete();
            }
        }
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
