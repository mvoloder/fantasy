<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standings extends Model
{
    protected $fillable = [

        'id',
        'league_id',
        'user_id',
        'matchup_id',
        'team_id',
        'wins',
        'loses',
        'pct',

    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function league()
    {
        return $this->hasMany('App\League', 'league_id');
    }

    public function matchup()
    {
        return $this->hasMany('App\Matchup', 'matchup_id');
    }

    public function teamSettings()
    {
        return $this->hasMany('App\TeamSettings', 'team_id');
    }
}
