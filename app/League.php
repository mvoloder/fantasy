<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeagueSettings extends Model
{
    //mass assignable settings attributes

    protected $fillable = [
        'league_id',
        'league_password',
        'league_name',
        'number_of_teams',
        'draft_time'

    ];
}
