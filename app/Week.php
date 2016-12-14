<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    protected $fillable = [

        'id',
        'games',

    ];

    public function games()
    {
        return $this->hasMany('App\Game', 'game_id');
    }

    public function player()
    {
        return $this->hasMany('App\Player');
    }
}
