<?php

namespace App\Http\Controllers;

use App\League;
use App\TeamSettings;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

use App\Matchup;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('choosesport');
    }

    /**
     * Get list of all user leagues
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sport()
    {
        //get current user's id
        $user = Auth::User()->id;
        $tm_sett = TeamSettings::all();

        $user_leagues = [];
        foreach ($tm_sett as $tm_set){
            if($user == $tm_set->user_id){
                $user_leagues[$tm_set->id] = $tm_set->team_name;
            }
        }

        return view('nba', compact('user_leagues', 'tm_sett'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function invite()
    {
        return view('invite');
    }

    public function draft()
    {
        return view('draft.general');
    }

    public function joinleague()
    {

        return view('joinleague');
    }

    public function joinleagueCheck()
    {
        $leaguePass = League::where('league_password', Input::get('league_password'))->first();
        $leagueName = League::where('league_name', Input::get('league_name'))->first();
        $leagueId = League::find(1);

        if (is_null($leaguePass) && is_null($leagueName)){
            return view('joinleague');
        }
        return view('team', ['leagueId' => count($leagueId)]);
    }

    public function progress()
    {
        return view('inprogress');
    }

    public function generate()
    {

        $teams = TeamSettings::where('league_id', 1)->get();

        //get exact number of teams in the league
        $total_teams = count($teams);

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

                //matchup model
                $matchups = new Matchup();
                $matchups->home_user_id = $home + 1;
                $matchups->away_user_id = $away + 1;
                $matchups->week = $round + 1;
                $matchups->match = $match + 1;
                $matchups->save();

            }

        }

        return redirect()->back();
    }

}
