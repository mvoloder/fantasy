<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchup extends Model
{
    protected $fillable = [

        'id',
//        'league_id',
        'week',
        'match',
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
        'home_score',
        'away_score',
    ];

//    public function league()
//    {
//        return $this->belongsTo('App\League', 'league_id');
//    }
}
