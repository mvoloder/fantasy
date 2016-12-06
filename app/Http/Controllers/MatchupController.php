<?php

namespace App\Http\Controllers;

use App\League;
use App\Player;
use App\Team;
use App\TeamSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display list of league's matchUps
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $teams = TeamSettings::where('league_id', 1)->get();


        //get exact number of teams in the league
        $total_teams = count($teams);

        $teamNamesMap = [];

        foreach ($teams as $team) {
            $teamNamesMap[$team->id] = $team->team_name;
        }


        //define total rounds and number of matches per round
        $total_rounds = 10; //(fixed for now)
        $matchesPerRound = $total_teams / 2;
        $rounds = array();

        //generate fixtures
        for ($i = 0; $i < $total_rounds; $i++) {
            $rounds[$i] = array();
        }

        for ($round = 0; $round < $total_rounds; $round++) {
            for ($match = 0; $match < $matchesPerRound; $match++) {
                $home = ($round + $match) % ($total_teams - 1);
                $away = ($total_teams - 1 - $match + $round) % ($total_teams - 1);
                if ($match == 0) {
                    $away = $total_teams - 1;
                }
                $rounds[$round][$match] = $teamNamesMap[($home + 1)] . " vs " . $teamNamesMap[($away + 1)];
            }
        }
        $smthn = count($rounds);



        return view('matchups', compact('rounds', 'smthn', 'teamNamesMap'));
    }

    /**
     * Return matchup table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function matchup()
    {
        $t_setts = TeamSettings::all();

        $tm_settings = [];
        foreach ($t_setts as $t_sett){
            $tm_settings [$t_sett->id] = $t_sett->team_name;
        }

        return view('matchup', compact('tm_settings'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function league()
    {
        return view('league');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function standings()
    {
        return view('standings');
    }

    /**
     * Return list of undrafted players
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function players()
    {
        $players = Player::all();
        $teams = Team::all();

        $playersId = [];
        foreach ($players as $player){
            $playersId[] = $player->id;

        }

        $teamsId = [];
        foreach ($teams as $team){
            $teamsId[] = $team->player_id;
        }

        $undrafted = array_diff($playersId, $teamsId);


        return view('players', compact('undrafted', 'players'));
    }



}
