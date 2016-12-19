<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamSettings extends Model
{
    protected $fillable = [

        'id',
        'team_name',
        'user_id',
        'league_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function league()
    {
        return $this->hasMany('App\League', 'league_id');
    }


}
