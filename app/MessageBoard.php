<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageBoard extends Model
{
    protected $fillable = [

        'id',
        'topic',
        'message',
    ];

    public function league()
    {
        return $this->belongsTo('App\League');
    }
}
