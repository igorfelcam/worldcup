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

// bets page
Route::get( '/home', 'HomeController@index' )->name( 'home' );
// notifications
Route::get( '/notf', 'NotificationController@index' )->name( 'notf' );
// notification acept
Route::get( 'api/ntfacept/{inv_id}/{group_id}/{user_id}', 'NotificationController@acept' )->name( 'ntfacept' );
// Route::get( '/worldcup/api/ntfacept/{inv_id}/{group_id}/{user_id}', 'NotificationController@acept' )->name( 'ntfacept' );
// notification recused
Route::get( 'api/ntfrecused/{inv_id}', 'NotificationController@recused' )->name( 'ntfrecused' );
// Route::get( '/worldcup/api/ntfrecused/{inv_id}', 'NotificationController@recused' )->name( 'ntfrecused' );
// false view create group
Route::get( '/notGroup', 'HomeController@notViewCreateGroup' )->name( 'notGroup' );
// create bet group
Route::get( '/cbg', 'GroupController@index' )->name( 'cbg' );
Route::post( '/cbg', 'GroupController@create' )->name( 'cbg' );
// search bet group page
Route::get( '/sbg', 'GroupController@searchPage' )->name( 'sbg' );
// search bet groups
Route::get( 'api/search/{name}', 'GroupController@search' )->name( 'search' );
// Route::get( '/worldcup/api/search/{name}', 'GroupController@search' )->name( 'search' );
// ask invit enter bet group
Route::get( 'api/enterGroup/{group_id}/{user_id}', 'GroupController@enterGroup' )->name( 'enterGroup' );
// Route::get( '/worldcup/api/enterGroup/{group_id}/{user_id}', 'GroupController@enterGroup' )->name( 'enterGroup' );
// exit bet group
Route::get( 'api/exitGroup/{group_id}/{user_id}', 'GroupController@exitGroup' )->name( 'exitGroup' );
// Route::get( '/worldcup/api/exitGroup/{group_id}/{user_id}', 'GroupController@exitGroup' )->name( 'exitGroup' );
// make bet
Route::get( 'api/makeBet/{match_id}/{team}/{bet_value}', 'BetController@create' )->name( 'makeBet' );
// Route::get( '/worldcup/api/makeBet/{match_id}/{team}/{bet_value}', 'BetController@create' )->name( 'makeBet' );
// compare friend
Route::get( 'compare', 'BetController@compareView' )->name( 'compare' );
// get friends
Route::get( 'api/comparefriend/{name}', 'BetController@search' )->name( 'comparefriend' );
// Route::get( '/worldcup/api/comparefriend/{name}', 'BetController@search' )->name( 'comparefriend' );
// get compare
Route::get( 'api/getcompare/{friend}', 'BetController@getCompare' )->name( 'getcompare' );
// Route::get( '/worldcup/api/getcompare/{friend}', 'BetController@getCompare' )->name( 'getcompare' );
// manage page bet group
Route::get( '/mbg', 'GroupController@managePage' )->name( 'mbg' );
// ranking bet group
Route::get( '/betgroup', 'GroupController@showBetGroup' )->name( 'betgroup' );
// get users of bet group
Route::get( 'api/usrgroup/{id}', 'GroupController@usersGroup' )->name( 'usrgroup' );
// Route::get( '/worldcup/api/usrgroup/{id}', 'GroupController@usersGroup' )->name( 'usrgroup' );
// include user in bet group
Route::get( 'api/usrgroupins/{user}/{group}', 'GroupController@includeUserGroup' )->name( 'usrgroupins' );
// Route::get( '/worldcup/api/usrgroupins/{user}/{group}', 'GroupController@includeUserGroup' )->name( 'usrgroupins' );
// remove user in bet group
Route::get( 'api/usrgrouprem/{id}/{group}/{user}', 'GroupController@removeUserGroup' )->name( 'usrgrouprem' );
// Route::get( '/worldcup/api/usrgrouprem/{id}/{group}/{user}', 'GroupController@removeUserGroup' )->name( 'usrgrouprem' );
// results
Route::get( '/matches', 'AdmController@index' )->name( 'matches' );
Route::post( '/admResults', 'AdmController@results' )->name( 'admResults' );
// delete group
Route::get( 'api/removeGroup/{id}', 'GroupController@remGroup' )->name( 'removeGroup' );
