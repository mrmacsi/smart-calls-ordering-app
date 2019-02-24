<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = ['id', 'type', 'title', 'text', 'next', 'extra'];
    public $incrementing = false;
    protected $casts = [
        'extra' => 'array',
    ];

    public function getNcooAttribute()
    {
        if ($this->type == 'talk') {
            return [
                [
                    'action' => 'talk',
                    'text' => $this->text
                ],
                [
                    'action' => 'input',
                    'text' => $this->text,
                    'timeOut' => 0,
                    'eventUrl' => [
                        route('dtmf', ['action' => $this->id])
                    ]
                ]
            ];
        } else {
            return [
                [
                    'action' => 'talk',
                    'text' => $this->text
                ],
                [
                    'action' => 'input',
                    'maxDigits' => 1,
                    'eventUrl' => [
                        route('dtmf', ['action' => $this->id])
                    ]
                ],
            ];
        }


    }
}
