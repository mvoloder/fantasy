<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [

        'id',
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
        'free_throw'

    ];

}