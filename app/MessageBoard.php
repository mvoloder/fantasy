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
}
