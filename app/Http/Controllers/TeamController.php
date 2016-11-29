<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Team;
use Illuminate\Support\Facades\Validator;
use App\League;
use App\Player;

class TeamController extends Controller
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
        $players = Player::all();
        $leagues = League::all();

        foreach ($leagues as $league){
            $number_of_teams = $league->number_of_teams;
            $leagueId = $league->id;

            $arr = range(1, $number_of_teams);
//            break;
        }


        return view('draft.general', compact('players', 'arr', 'leagueId'));
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
     * Input team name
     */
    public function store(Request $request)
    {

        $teams = new Team();

        $inputs = $request->all();
        foreach ($inputs as $key => $one)
        {
            if (strpos($key, 'player-') === 0) {
                $playerId = substr($key, 7);

                $teams->player_id = $playerId;
            }
        }

        $teams->user_id = Input::get('user_id');
        $teams->league_id = Input::get('league_id');



        $teams->save();
//        Player::find($playerId)->destroy($playerId);


        return redirect()->back();
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
