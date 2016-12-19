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
        'playerNumber',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function team()
    {
        return $this->hasMany('App\Team');
    }
}
