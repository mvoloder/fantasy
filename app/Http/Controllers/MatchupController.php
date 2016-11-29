<?php

namespace App\Http\Controllers;

use App\League;
use App\Player;
use App\Team;
use App\TeamSettings;
use Illuminate\Http\Request;

class MatchupController extends Controller
{
    /**
     * Display list of league's matchUps
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $players = Player::all();
        $teams = Team::where('league_id', 1)->get();
//        $t_setts = TeamSettings::all();

        //get exact number of teams in the league
        $total_teams = count($teams);
//        $team_names = [];
//        foreach ($t_setts as $t_sett){
//            $team_names[] = $t_sett->team_name;
//        }

        //define total rounds and number of matches per round
        $total_rounds = 20; //$total_teams - 1; (fixed for now)
        $matchesPerRound = $total_teams / 2;
        $rounds = array();

        //generate fixtures
        for ($i = 0; $i < $total_rounds; $i++){
            $rounds[$i] = array();
        }
        for ($round = 0; $round < $total_rounds; $round++){
            for ($match = 0; $match < $matchesPerRound; $match++){
                $home = ($round + $match) % ($total_teams - 1);
                $away = ($total_teams - 1 - $match + $round) % ($total_teams - 1);
                if ($match == 0){
                    $away = $total_teams - 1;
                }
                $rounds[$round][$match] = ($home + 1) . " vs " . ($away + 1);
            }
        }

        $smthn = count($rounds);


        return view('matchup', compact('teams', 'players', 'homeTeams', 'awayTeams', 'team_names', 'rounds', 'smthn'));
    }

}
