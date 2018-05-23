<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get( '/', function () {
    return view( 'auth.login' );
});

Auth::routes();

Route::get( '/home', 'HomeController@index' )->name( 'home' );
// false view create group
Route::get( '/notGroup', 'HomeController@notViewCreateGroup' )->name( 'notGroup' );
// create bet group
Route::get( '/cbg', 'GroupController@index' )->name( 'cbg' );
Route::post( '/cbg', 'GroupController@create' )->name( 'cbg' );
// search bet groups
Route::get( 'api/search/{name}', 'GroupController@search' )->name( 'search' );
// ask invit enter bet group
Route::get( 'api/enterGroup/{group_id}/{user_id}', 'GroupController@enterGroup' )->name( 'enterGroup' );
// exit bet group
Route::get( 'api/exitGroup/{group_id}/{user_id}', 'GroupController@exitGroup' )->name( 'exitGroup' );
// make bet
Route::get( 'api/makeBet/{match_id}/{team}/{bet_value}', 'BetController@create' )->name( 'makeBet' );
