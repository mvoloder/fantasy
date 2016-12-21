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

        $standings = Standings::all();
        $t_setts = TeamSettings::all();

        return view('standings', compact('standings', 'weeks', 't_setts'));
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
     * @param  \Illuminate\Http\Request  $request
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
        foreach ($teams as $team){
            $teamsId[] = $team->player_id;
        }



        foreach ($matchups as $matchup){
            foreach ($teams as $team){
                if (($matchup->home_user_id == $team->user_id) && ($matchup->week == $weekId)){
                    foreach ($players as $player){
                        if ($team->player_id == $player->id){
                            $matchup->h_pts += $player->points * $numberOfGames;
                            $matchup->h_reb += $player->rebounds * $numberOfGames;
                            $matchup->h_ast += $player->assists * $numberOfGames;
                            $matchup->h_st += $player->steals * $numberOfGames;
                            $matchup->h_blk += $player->blocks * $numberOfGames;
                            $matchup->h_to += $player->turnovers * $numberOfGames;
                            $matchup->h_fg += ($player->field_goal * $numberOfGames) / $numberOfGames;
                            $matchup->h_ft += ($player->free_throws * $numberOfGames) / $numberOfGames;

                            $matchup->save();
                        }
                    }
                }elseif(($matchup->away_user_id == $team->user_id) && ($matchup->week == $weekId)){
                    foreach ($players as $player){
                        if ($team->player_id == $player->id){
                            $matchup->a_pts += $player->points * $numberOfGames;
                            $matchup->a_reb += $player->rebounds * $numberOfGames;
                            $matchup->a_ast += $player->assists * $numberOfGames;
                            $matchup->a_st += $player->steals * $numberOfGames;
                            $matchup->a_blk += $player->blocks * $numberOfGames;
                            $matchup->a_to += $player->turnovers * $numberOfGames;
                            $matchup->a_fg += ($player->field_goal * $numberOfGames) / $numberOfGames;
                            $matchup->a_ft += ($player->free_throws * $numberOfGames) / $numberOfGames;

                            $matchup->save();
                        }
                    }
                }
                if ($matchup->h_pts > $matchup->a_pts){
                    $matchup->home_score += 1;
                }elseif($matchup->a_pts > $matchup->h_pts) {$matchup->away_score +=1;}

                if ($matchup->h_reb > $matchup->a_reb){
                    $matchup->home_score += 1;
                }elseif($matchup->a_reb > $matchup->h_reb) {$matchup->away_score +=1;}

                if ($matchup->h_ast > $matchup->a_ast){
                    $matchup->home_score += 1;
                }elseif($matchup->a_ast > $matchup->h_ast) {$matchup->away_score +=1;}

                if ($matchup->h_st > $matchup->a_st){
                    $matchup->home_score += 1;
                }elseif($matchup->a_st > $matchup->h_st) {$matchup->away_score +=1;}

                if ($matchup->h_blk > $matchup->a_blk){
                    $matchup->home_score += 1;
                }elseif($matchup->a_blk > $matchup->h_blk) {$matchup->away_score +=1;}

                if ($matchup->h_to > $matchup->a_to){
                    $matchup->home_score += 1;
                }elseif($matchup->a_to > $matchup->h_to) {$matchup->away_score +=1;}

                if ($matchup->h_ft > $matchup->a_ft){
                    $matchup->home_score += 1;
                }elseif($matchup->a_ft > $matchup->h_ft) {$matchup->away_score +=1;}

                if ($matchup->h_fg > $matchup->a_fg){
                    $matchup->home_score += 1;
                }elseif($matchup->a_fg > $matchup->h_fg) {$matchup->away_score +=1;}

                $standings = new Standings();


                $standings->team_id = $team->id;
                $standings->league_id = $leagueMapId;
                $standings->matchup_id = $matchup->id;
                $standings->pct = ($matchup->home_score / 8);
                $standings->save();
            }
//            $standings->save();
        }



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
