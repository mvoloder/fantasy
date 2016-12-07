<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [

        'id',
        'points',
        'rebounds',
        'assists',
        'turnovers',
        'blocks',
        'steals',
        'field_goal',
        'free_throw',
        'week_id',
        'player_id',
    ];

    public function player()
    {
        return $this->belongsTo('App\Player', 'player_id');
    }

    public function week()
    {
        return $this->hasMany('App\Week', 'week_id');
    }
}
