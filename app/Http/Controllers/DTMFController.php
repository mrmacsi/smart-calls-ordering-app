<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DTMFController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $action = Action::find($request->action);
        $next = $action->next->ncoo;
        Log::info('here we are');
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
