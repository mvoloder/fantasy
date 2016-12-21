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
Route::post('nba/joinleague', 'HomeController@joinleagueCheck');
Route::resource('nba/team', 'TeamSettingsController');
Route::resource('team', 'MainLeagueController');
Route::get('matchups', 'MatchupController@index');
Route::get('matchup/{week}/{match}', 'MatchupController@matchup');
Route::get('league', 'MatchupController@league');
Route::resource('messageboard', 'MessageBoardController');
Route::resource('standings', 'StandingsController');
Route::get('players', 'MatchupController@players');


/**
 * Send Invite mail
 */
//Route::get('invite', 'HomeController@invite');
Route::post('nba/team/invite', function (\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer) {
    $mailer->to($request->input('email'))
        ->send(new \App\Mail\Invite($request->input('id'), $request->input('pass')));
    return redirect('nba');
})->name('nba');




