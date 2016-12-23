<?php

namespace App\Http\Controllers;

use App\Game;
use App\League;
use App\Matchup;
use App\Player;
use App\Standings;
use App\Team;
use App\TeamSettings;
use App\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Route;

class StandingsController extends Controller
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
        //dynamically set simulate week buttons
        $weeks = Week::all();
        $matchups = Matchup::all();


        $standings = Standings::all();
        $t_setts = TeamSettings::all();

        return view('standings', compact('standings', 'weeks', 't_setts', 'matchups', 'home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('standings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $games = Game::all();
        $teams = Team::all();
        $players = Player::all();
        $weeks = Week::all();
        $matchups = Matchup::all();
        $leagueMap = League::find(1);
        $leagueMapId = $leagueMap->id;
        $matchups = Matchup::all();
        $leagues = League::all();


        //get number of games by week
        $weekId = Input::get('simulate');
        $numberOfGames = Input::get('game');

        $teamsId = [];
        foreach ($teams as $team) {
            $teamsId[] = $team->player_id;
        }


        foreach ($teams as $team) {
            foreach ($matchups as $matchup) {
                $standings = new Standings();
                $standings->league_id = $leagueMapId;
                $standings->matchup_id = $matchup->id;

                if (($matchup->home_user_id == $team->user_id) && ($matchup->week == $weekId)) {
                    $standings->team_id = $team->id;
//                    $standings->save();

                    foreach ($players as $player) {
                        if ($team->player_id == $player->id) {
                            $matchup->h_pts = $player->points * $numberOfGames;
                            $matchup->h_reb = $player->rebounds * $numberOfGames;
                            $matchup->h_ast = $player->assists * $numberOfGames;
                            $matchup->h_st = $player->steals * $numberOfGames;
                            $matchup->h_blk = $player->blocks * $numberOfGames;
                            $matchup->h_to = $player->turnovers * $numberOfGames;
                            $matchup->h_fg = ($player->field_goal * $numberOfGames) / $numberOfGames;
                            $matchup->h_ft = ($player->free_throws * $numberOfGames) / $numberOfGames;

                            $standings->wins = $matchup->home_score;
                            $standings->loses = (8 - $matchup->home_score);
                            $standings->pct = ($matchup->home_score / 8);


                            $matchup->save();
                        }
                    }
                } elseif (($matchup->away_user_id == $team->user_id) && ($matchup->week == $weekId)) {

                    $standings->team_id = $team->id;
//                    $standings->save();

                    foreach ($players as $player) {
                        if ($team->player_id == $player->id) {
                            $matchup->a_pts = $player->points * $numberOfGames;
                            $matchup->a_reb = $player->rebounds * $numberOfGames;
                            $matchup->a_ast = $player->assists * $numberOfGames;
                            $matchup->a_st = $player->steals * $numberOfGames;
                            $matchup->a_blk = $player->blocks * $numberOfGames;
                            $matchup->a_to = $player->turnovers * $numberOfGames;
                            $matchup->a_fg = ($player->field_goal * $numberOfGames) / $numberOfGames;
                            $matchup->a_ft = ($player->free_throws * $numberOfGames) / $numberOfGames;

                            $standings->wins = $matchup->away_score;
                            $standings->loses = (8 - $matchup->away_score);
                            $standings->pct = ($matchup->away_score / 8);


                            $matchup->save();
                        }
                    }
                }
//                $matchup->save();
            }
        }

//        $standings = new  Standings();
//




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
//        return view('standings');
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
//        $standings = Standings::findOrFail($id);
//
//        $input = $request->all();
//        $standings->fill($input)->save();
//
//        return redirect()->back();
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
