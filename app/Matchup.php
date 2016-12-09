<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchup extends Model
{
    protected $fillable = [

        'id',
        'league_id',
        'home_user_id',
        'away_user_id',
        'fg',
        'ft',
        'pts',
        'reb',
        'ast',
        'st',
        'blk',
        'to',
        'score',
    ];

    public function league()
    {
        return $this->belongsTo('App\League', 'league_id');
    }
}
