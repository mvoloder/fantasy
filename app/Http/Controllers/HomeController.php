<?php

namespace App\Http\Controllers;

use App\League;
use App\TeamSettings;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

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

        return view('nba', compact('user_leagues'));
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

    public function progress()
    {
        return view('inprogress');
    }

}
