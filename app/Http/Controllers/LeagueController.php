<?php

namespace App\Http\Controllers;

use App\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class LeagueController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('createleague');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Validate and save league settings
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),

            [
                'league_name' => 'required|unique:leagues',
                'league_password' => 'required|min:4',
                'number_of_teams' => 'required',
                'playerNumber' => 'required',

            ]
        );

        if ($validator->fails()) {

            return view('nba');

        } else {

            //instance of League model
            $leagues = new League();

            $leagues->league_name = Input::get("league_name");
            $leagues->league_password = Input::get("league_password");
            $leagues->number_of_teams = Input::get("number_of_teams");
            $leagues->playerNumber = Input::get("playerNumber");
            $leagues->user_id = Input::get('user_id');


            //create new league
            $leagues->save();

        }

        return view('team', ['leagueId' => $leagues->id]);
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
