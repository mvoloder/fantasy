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
Route::get('sport', 'HomeController@progress');
Route::get('generate', 'HomeController@generate');
Route::resource('draft', 'TeamController');
Route::get('nba', 'HomeController@sport');
Route::resource('nba/createleague', 'LeagueController');
Route::get('nba/joinleague', 'HomeController@joinleague');
Route::resource('nba/joinleague', 'UserLeagueController');
Route::resource('nba/team', 'TeamSettingsController');
Route::resource('team', 'MainLeagueController');
Route::get('matchups', 'MatchupController@index');
Route::get('matchup/{week}/{id}', 'MatchupController@matchup');
Route::get('league', 'MatchupController@league');
Route::resource('messageboard', 'MessageBoardController');
Route::get('standings', 'MatchupController@standings');
Route::get('players', 'MatchupController@players');


/**
 * Send Invite mail
 */

Route::post('nba/team/invite', function (\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer) {
    $mailer->to($request->input('email'))
        ->send(new \App\Mail\Invite($request->input('test')));
    return redirect()->back();
})->name('nba');




