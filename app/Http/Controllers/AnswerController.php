<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnswerController extends Controller
{
    public function index(Request $request)
    {
        $ncco = [
            [
                'action' => 'talk',
                'text' => 'Please enter a digit'
            ],
            [
                'action' => 'input',
                'eventUrl' => [
                    url('/webhooks/dtmf')
                ]
            ],
            [
                'action' => 'talk',
                'text' => 'Thank you'
            ],
        ];

        Log::info($ncco);
        return response()->json($ncco);
    }
}
