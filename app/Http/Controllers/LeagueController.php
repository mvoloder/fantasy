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

        return view('joinleague');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),

            [
                'league_name' => 'required|unique:leagues',
                'league_password' => 'required|min:4',
                'number_of_teams' => 'required',
                'point_guard' => 'required',
                'shooting_guard' => 'required',
                'guard' => 'required',
                'small_forward' => 'required',
                'forward' => 'required',
                'power_forward' => 'required',
                'center' => 'required',
                'utility' => 'required',
                'bench' => 'required',
                'draft_time' => 'required'

            ]
        );

        if ($validator->fails()) {
            //var_dump($validator->errors());
            return view('nba');
        } else {

            //instance of League model
            $leagues = new League();

            $leagues->league_name = Input::get("league_name");
            $leagues->league_password = Input::get("league_password");
            $leagues->number_of_teams = Input::get("number_of_teams");
            $leagues->point_guard = Input::get("point_guard");
            $leagues->shooting_guard = Input::get("shooting_guard");
            $leagues->guard = Input::get("guard");
            $leagues->small_forward = Input::get("small_forward");
            $leagues->forward = Input::get("forward");
            $leagues->power_forward = Input::get("power_forward");
            $leagues->center = Input::get("center");
            $leagues->utility = Input::get("utility");
            $leagues->bench = Input::get("bench");
            $leagues->draft_time = Input::get("draft_time");
            $leagues->user_id = Input::get('user_id');

            //create new league
            $leagues->save();

        }

        return view('team');
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
