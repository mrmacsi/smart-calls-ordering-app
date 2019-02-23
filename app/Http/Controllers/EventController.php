<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $keypair = new \Nexmo\Client\Credentials\Keypair(
            file_get_contents(base_path('private.key')),
            '8e2d8ffe-7ca6-4280-ac6a-d75f249264c5'
        );

        $client = new \Nexmo\Client($keypair);

        $call = $client->calls()->create([
            'to' => [[
                'type' => 'phone',
                'number' => '+447453533740'
            ]],
            'from' => [
                'type' => 'phone',
                'number' => '+447520632428'
            ],
            'answer_url' => ['https://developer.nexmo.com/ncco/tts.json'],
        ]);
    }
    public function try()
    {
        
    }
}
