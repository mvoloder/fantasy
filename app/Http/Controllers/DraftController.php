<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    public function playersList()
    {
        $players = Player::all();

        return view('draft.general', compact('players'));
    }

    public function draftOrder()
    {

    }

}
