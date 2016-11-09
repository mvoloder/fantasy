<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLeague extends Model
{
    protected $fillable = [

        'id',
        'user_id',
        'league_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function league()
    {
        return $this->belongsTo('App\League');
    }
}
