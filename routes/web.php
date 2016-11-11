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

Route::get('nba', 'HomeController@sport');
Route::resource('nba/createleague', 'LeagueController');
Route::resource('nba/joinleague', 'UserLeagueController');
Route::resource('nba/team', 'TeamSettingsController');

Route::post('nba/team', function (\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer){
    $mailer->to($request->input('email'))
        ->send(new \App\Mail\Invite($request->input($bizovac)));
   return redirect()->back();
})->name('nba/team');




