<?php

namespace App\Http\Controllers;

use App\Game;
use App\League;
use App\Player;
use App\Team;
use App\TeamSettings;
use App\User;
use App\Week;
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



        return view('matchups', compact('rounds', 'smthn', 'teamNamesMap'));
    }

    /**
     * Return matchup table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function matchup()
    {
        $t_setts = TeamSettings::all();
        $weeks = Week::all();
        $games = Game::all();
        $teams = Team::all();
        $players = Player::all();
        $leagues = League::all();
        $users = User::all();

        $userIds = [];
        foreach ($users as $user){
            $userIds[] = $user->id;
        }

        $leaguesId = [];
        foreach ($leagues as $league){
            $leaguesId[] = $league->id;
        }

        //get all players by id
        $playersId = [];
        foreach ($players as $player){
            $playersId[] = $player->id;
        }


        //get all players from games by id
        $gamesId = [];
        foreach ($games as $game){
                $gamesId[$game->week_id][] = $game->player_id;
        }

        //get all weeks by id
        $weeksId = [];
        foreach ($weeks as $week){
            $weeksId[$week->id] = $week->games;
        }

        //get all team names
        $tm_settings = [];
        foreach ($t_setts as $t_sett){
            $tm_settings [] = $t_sett->team_name;
        }


        //get all drafted players from teams by id
        $teamsId = [];
        $tmNmsMp = [];
        foreach ($teams as $team){
            $teamsId[] = $team->player_id;
            $tmNmsMp[$team->id] = $team->name;
        }

        $teamPlayers = array_intersect($teamsId, $playersId);



        return view('matchup', compact('t_setts', 'players', 'teams', 'teamPlayers', 'userIds', 'tmNmsMp'));
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
