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
    ];
}
