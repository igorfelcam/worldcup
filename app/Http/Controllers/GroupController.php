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
        $user_id = auth()->user()->id;

        // user bet groups
        $user_groups = DB::table( 'user_bets_groups as ubg' )
                            ->select( 'ubg.bets_group_id', 'bg.name' )
                            ->join( 'bets_groups as bg', 'ubg.bets_group_id', '=', 'bg.id' )
                            ->where( 'ubg.user_id', $user_id )
                            ->get();

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

        // redirect the page create bet group
        return view( 'create_bet_group' )->with( 'bet_groups', $bet_groups );
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
        return redirect()->route('home');
    }


    /*
     * open page search bet group
    */
    public function searchPage()
    {
        $user_id = auth()->user()->id;

        // user bet groups
        $user_groups = DB::table( 'user_bets_groups as ubg' )
                            ->select( 'ubg.bets_group_id', 'bg.name' )
                            ->join( 'bets_groups as bg', 'ubg.bets_group_id', '=', 'bg.id' )
                            ->where( 'ubg.user_id', $user_id )
                            ->get();

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

        // redirect the page search bet group
        return view( 'search_bet_group' )->with( 'bet_groups', $bet_groups );
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
                        ->orderBy('bg.name', 'asc')
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
                            ->join( 'bets_groups as bg', 'ubg.bets_group_id', '=', 'bg.id' )
                            ->where([
                                [ 'ubg.user_id', '=', $user_id ],
                                [ 'ubg.bets_group_id', '=', $group_id ],
                                [ 'bg.user_create_id', '<>', $user_id ]
                            ])
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

    /*
     * manage be group
    */
    public function managePage() {
        $user_id = auth()->id();

        $bet_groups = DB::table( 'bets_groups' )
                        ->select( 'name' )
                        ->where( 'user_create_id', $user_id )
                        ->get();
        $bet_groups = json_encode( $bet_groups );

        return view( 'manage' )->with( 'bet_groups', $bet_groups );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBetGroup()
    {
        // redirect conform number of bet groups
        $user_id = auth()->id();

        // count bet groups
        $count_bet_groups = DB::table( 'user_bets_groups as ubg' )
                                ->join( 'bets_groups as btg', 'ubg.bets_group_id', '=', 'btg.id' )
                                ->where( 'ubg.user_id', '=', $user_id )
                                ->count();

        // user bet groups
        $user_groups = DB::table( 'user_bets_groups as ubg' )
                            ->select( 'ubg.bets_group_id', 'bg.name' )
                            ->join( 'bets_groups as bg', 'ubg.bets_group_id', '=', 'bg.id' )
                            ->where( 'ubg.user_id', $user_id )
                            ->get();

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


        if ( $count_bet_groups == 1 ) {
            $ranking = $this->show( $user_groups[0]->bets_group_id, false );
        }
        else {
            $ranking = $this->show( $user_groups, true );
        }

        return view( 'ranking_bet_group' )->with([
                                    'count_bet_groups'  => $count_bet_groups,
                                    'bet_groups'        => $bet_groups,
                                    'ranking'           => $ranking,
                                    'user_groups'       => $user_groups
                                ]);
    }

    public function show( $bet_group_id, $more_groups )
    {
        if ( !$more_groups ) {
            // show ranking of group
            $ranking = DB::table( 'user_bets_groups as ubg' )
                            ->select(
                                'ubg.bets_group_id as bets_group_id',
                                'usr.username as user_name',
                                'usr.total_score as total_score',
                                DB::raw( 'case when a.hit_the_mark is null then 0 else a.hit_the_mark end as hit_the_mark' ),
                                DB::raw( 'case when b.almost_hit is null then 0 else b.almost_hit end as almost_hit' )
                                )
                                ->join( 'users as usr', 'ubg.user_id', 'usr.id' )
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
                                ->where( 'ubg.bets_group_id', '=', $bet_group_id )
                                ->orderBy( 'usr.total_score', 'desc' )
                                ->orderBy( 'a.hit_the_mark', 'desc' )
                                ->orderBy( 'b.almost_hit', 'desc' )
                                ->get();
        }
        elseif ( $more_groups ) {
            $ranking = array();
            foreach ( $bet_group_id as $key ) {
                $ranking[ $key->name ] = DB::table( 'user_bets_groups as ubg' )
                                            ->select(
                                                'ubg.bets_group_id as bets_group_id',
                                                'usr.username as user_name',
                                                'usr.total_score as total_score',
                                                DB::raw( 'case when a.hit_the_mark is null then 0 else a.hit_the_mark end as hit_the_mark' ),
                                                DB::raw( 'case when b.almost_hit is null then 0 else b.almost_hit end as almost_hit' )
                                                )
                                                ->join( 'users as usr', 'ubg.user_id', 'usr.id' )
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
                                                ->where( 'ubg.bets_group_id', '=', $key->bets_group_id )
                                                ->orderBy( 'usr.total_score', 'desc' )
                                                ->orderBy( 'a.hit_the_mark', 'desc' )
                                                ->orderBy( 'b.almost_hit', 'desc' )
                                                ->get();
            }
            $ranking = json_encode( $ranking );
        }
        else {
            $ranking = 0;
        }

        return $ranking;
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
