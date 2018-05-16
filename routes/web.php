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
// create bet group
Route::get( '/cbg', 'GroupController@index' )->name( 'cbg' );
Route::post( '/cbg', 'GroupController@create' )->name( 'cbg' );
// search bet groups
Route::get( 'api/search/{name}', 'GroupController@search' )->name( 'search' );
// ask invit enter bet group
Route::get( 'api/enterGroup/{group_id}/{user_id}', 'GroupController@enterGroup' )->name( 'enterGroup' );
// exit bet group
Route::get( 'api/exitGroup/{group_id}/{user_id}', 'GroupController@exitGroup' )->name( 'exitGroup' );
