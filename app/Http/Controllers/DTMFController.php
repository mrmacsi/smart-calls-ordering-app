<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DTMFController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();

        Log::info($params);
        $ncco = [
            [
                'action' => 'talk',
                'text' => 'You pressed Taner '.$params['dtmf']
            ]
        ];

        return response()->json($ncco);
    }
}
