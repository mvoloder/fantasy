<?php

namespace App\Http\Controllers;

use App\League;
use App\Player;
use App\User;
use App\UserLeague;
use Illuminate\Http\Request;
use App\Team;
use Illuminate\Support\Facades\Auth;

class MainLeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get current users  id
        $user = Auth::User()->id;
        $league = League::find(1);
        $league_id = $league->id;

        //search players through user and league id's
        $teamMappings = Team::where('user_id', $user)->where('league_id', $league_id)->get();

        $playerIds = [];
        foreach ($teamMappings as $mapping) {
            $playerIds[] = $mapping->player_id;

        }

        $players = Player::whereIn('id', $playerIds)->get();


        return view('myteam', compact('players'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
