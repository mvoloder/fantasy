<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [

        'id',
        'user_id',
        'league_id',
        'player_id'

    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function league()
    {
        return $this->belongsTo('App\League', 'league_id');
    }

    public  function player()
    {
        return $this->hasMany('App\Player', 'player_id');
    }

    public function game()
    {
        return $this->hasMany('App\Games');
    }

    public function matchup()
    {
        return $this->hasMany('App\Matchup');
    }

}
