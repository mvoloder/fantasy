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
        'h_fg',
        'h_ft',
        'h_pts',
        'h_reb',
        'h_ast',
        'h_st',
        'h_blk',
        'h_to',
        'a_fg',
        'a_ft',
        'a_pts',
        'a_reb',
        'a_ast',
        'a_st',
        'a_blk',
        'a_to',
        'home_score',
        'away_score',
    ];

//    public function league()
//    {
//        return $this->belongsTo('App\League', 'league_id');
//    }
}
