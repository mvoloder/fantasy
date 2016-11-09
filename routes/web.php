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
Route::resource('nba/joinleague', 'LeagueController');
Route::resource('nba/team', 'TeamController');

//Route::resource('index' , 'TeamController');


