<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'conversation_uuid',
        'action_id',
        'dtmf',
        'title',
    ];
}
