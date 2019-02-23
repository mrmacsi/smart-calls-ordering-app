<?php

namespace App\Http\Controllers;

use App\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnswerController extends Controller
{
    public function index(Request $request)
    {
        $ncco = Action::first()->ncoo;

        Log::info($ncco);

        return response()->json($ncco);
    }
}
