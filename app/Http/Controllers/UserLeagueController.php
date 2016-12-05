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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Input and validate league id and password for entering the league
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'league_id' => 'required|numeric',
                'league_password' => 'required'
            ]
        );

        if ($validator->fails()) {

            return view('nba');

        } else {

            $user_leagues = new UserLeague();

            $user_leagues->league_password = Input::get('league_password');
            $user_leagues->user_id = Input::get('user_id');
            $user_leagues->league_id = Input::get('league_id');

            $leagues = League::all();

//            $leagueIds = [];

            foreach($leagues as $league){
                $neki_id = $league->id;
                $pass = $league->league_password;

                if (($neki_id == $user_leagues->league_id) && ($pass == $user_leagues->league_password)){

                    $user_leagues->save();
                }

//                $leagueIds [] = $league->id;

            }
//            var_dump($leagueIds);


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
