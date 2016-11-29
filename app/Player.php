<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [

        'id',
        'is_drafted',
//        'user_id',
//        'league_id',
//        'team_id',
        'first_name',
        'last_name',
        'position',
        'points',
        'rebounds',
        'assists',
        'turnovers',
        'blocks',
        'steals',
        'field_goal',
        'free_throw',


    ];

    public function user()
    {
        return $this->hasMany('App\User', 'user_id', 'id');
    }

    public function league()
    {
        return $this->hasMany('App\League', 'league_id', 'id');
    }

    public  function team()
    {
        return $this->hasMany('App\Team', 'team_id', 'id');
    }

}