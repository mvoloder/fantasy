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

        //get number of games by week
        $weekId = Input::get('simulate');
        $numberOfGames = Input::get('game');

        $teamsId = [];
        foreach ($teams as $team){
            $teamsId[] = $team->player_id;
        }
//        var_dump($teamsId);


//        $home = DB::table('matchups')->where('home_user_id', $teamsId);
//        $away = DB::table('matchups')->where('away_user_id', $teamsId);

        $standings = DB::table('standings')
            ->join('games', 'week_id', '=', 'games.week_id')
            ->join('matchups', 'week', '=', 'matchups.week')
            ->get();

        var_dump($standings);





        return redirect()->route('standings');
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
