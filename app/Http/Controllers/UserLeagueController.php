<?php

namespace App\Http\Controllers;

use App\League;
use App\UserLeague;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserLeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('joinleague');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $leagues = League::all();
//        $leagues->get('league_name');
//        $leagues->get('league_password');
//        $leagues->get('id');


        $validator = Validator::make(
            $request->all(),
            [
                'league_id' => 'required',
                'league_password' => 'required'
            ]
        );

        if ($validator->fails()) {

            return view('nba');

        } else {

            $user_leagues = new UserLeague();

            //$user_leagues->league_name = Input::get('league_name');
            $user_leagues->league_password = Input::get('league_password');
            $user_leagues->user_id = Input::get('user_id');
            $user_leagues->league_id = Input::get('league_id');

            $user_leagues->save();

        }

        return view('team', ['leagueId' => $user_leagues->league_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
