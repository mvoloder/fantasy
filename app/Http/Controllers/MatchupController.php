<?php

namespace App\Http\Controllers;

use App\Game;
use App\League;
use App\Matchup;
use App\Player;
use App\Team;
use App\TeamSettings;
use App\User;
use App\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Route;

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
        $weeks = Week::all();

        $total_weeks = [];
        foreach ($weeks as $week){
            $total_weeks[] = $week->id;
        }

        //get exact number of teams in the league
        $total_teams = count($teams);

        $teamNamesMap = [];
        foreach ($teams as $team) {
            $teamNamesMap[$team->id] = $team->team_name;
        }

        //define total rounds and number of matches per round
        $total_rounds = 5; //(fixed for now)
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
                $rounds[$round][$match] = $teamNamesMap[($home + 1)] ." vs " . $teamNamesMap[($away + 1)];
            }

        }


        $smthn = count($rounds);



        return view('matchups', compact('rounds', 'smthn', 'teamNamesMap', 'weeks'));
    }

    /**
     * Return matchup table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function matchup(Request $request)
    {
        //fetch route params
        $round = Route::current()->getParameter('week');
        $match = Route::current()->getParameter('match');

        $teams = Team::all();
        $players = Player::all();
        $matchups = Matchup::all();
        $t_setts = TeamSettings::all();
        $weeks = Week::all();

        $kik = intval($round);

        foreach ($weeks as $week){
            if($week->games === $kik){
                $piz = $week->games;
            }
        }

        //get all drafted players by user id
        $userMaps = [];
        foreach ($teams as $team){
            $userMaps[$team->user_id][] = $team->player_id;
        }
//        var_dump($userMaps);

        $playerIds = [];
        foreach ($players as $player){
            $playerIds[] = $player->id;
        }

        $gamesId = [];
        foreach ($weeks as $week){
            $gamesId[] = $week->games;
        }

        return view('matchup', compact('gamesId', 'weeks', 'players','userMaps', 'matchups', 'round', 'match', 'teams', 't_setts', 'piz'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function league()
    {
        $league = League::find(1);
        $league_id = $league->id;
        return view('league', compact('league_id'));
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
