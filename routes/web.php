<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();
Route::get('/', 'HomeController@index');



Route::resource('draft', 'TeamController');
Route::get('nba', 'HomeController@sport');
Route::resource('nba/createleague', 'LeagueController');
Route::resource('nba/joinleague', 'UserLeagueController');
Route::resource('nba/team', 'TeamSettingsController');
Route::resource('team', 'MainLeagueController');
Route::get('matchup', 'MatchupController@index');
/**
 * Send Invite mail
 */

Route::post('nba/team/invite', function (\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer) {
    $mailer->to($request->input('email'))
        ->send(new \App\Mail\Invite($request->input('test')));
    return redirect()->back();
})->name('nba');




