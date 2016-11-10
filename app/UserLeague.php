<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLeague extends Model
{
    protected $fillable = [

        'id',
        'user_id',
        'league_id',
        'league_password',
        //'league_name'
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
