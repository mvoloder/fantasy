<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * Return viable players for draft
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::User()->id;
        $leagueMap = League::find(1);
        $leagueMapId = $leagueMap->id;

        $players = Player::all();
        $leagues = League::all();
        $teams = Team::all();

        //output available players for draft
        foreach ($leagues as $league){
            $number_of_teams = $league->number_of_teams;
            $leagueId = $league->id;

            $arr = range(1, $number_of_teams);
        }

        $playersId = [];
        foreach ($players as $player){
            $playersId[] = $player->id;

        }

        $teamsId = [];
        foreach ($teams as $team){
            $teamsId[] = $team->player_id;
        }

        $undrafted = array_diff($playersId, $teamsId);

        //output users picks
        $teamMappings = Team::where('user_id', $user)->where('league_id', $leagueMapId)->get();
        $playerIds = [];
        foreach ($teamMappings as $teamMapping){
            $playerIds[] = $teamMapping->player_id;
        }


        $spiller = Player::whereIn('id', $playerIds)->get();


        return view('draft.draft', compact('players', 'arr', 'leagueId', 'undrafted', 'spiller'));
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
