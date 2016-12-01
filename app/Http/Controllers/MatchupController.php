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
        $teams = TeamSettings::where('league_id', 1)->get();


        //get exact number of teams in the league
        $total_teams = count($teams);

        $teamNamesMap = [];

        foreach ($teams as $team){
            $teamNamesMap[$team->id] = $team->team_name;
        }

        //define total rounds and number of matches per round
        $total_rounds = 5; //(fixed for now)
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


                $rounds[$round][$match] = $teamNamesMap[($home + 1)] . " vs " . $teamNamesMap[($away + 1)];
//                var_dump($rounds);
            }
        }

        $smthn = count($rounds);


        return view('matchup', compact('rounds', 'smthn', 'teamNamesMap'));
    }

}
