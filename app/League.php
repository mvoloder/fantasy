<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    //mass assignable settings attributes

    protected $fillable = [

        'id',
        'league_name',
        'league_password',
        'number_of_teams',
        'point_guard',
        'shooting_guard',
        'guard',
        'small_forward',
        'forward',
        'power_forward',
        'center',
        'utility',
        'bench',
        'draft_time',
        'user_id'


    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


}
