<?php

namespace App\Http\Controllers;

use App\Action;
use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DTMFController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $dtmf = $request->get('dtmf');
        $action = Action::find($request->get('action'));
        $conversation_uuid = $request->get('conversation_uuid');

//        Log::info('params here');
//        Log::info($params);

        Log::info('action:');
        Log::info($action);
        Log::info('dtmf');
        Log::info($dtmf);

        // Save answers
        if ($action->type == 'question' || $action->type == 'input') {
            Answer::create([
                'conversation_uuid' => $conversation_uuid,
                'dtmf' => $dtmf,
                'title' => $action->title,
                'action_id' => $action->id,
            ]);
        }

        $next = false;
        // What's next?
        if ($action->type == 'question') {
            if ($dtmf == null) {
                $next = $action;
            } else {
                $next = Action::find($action->extra[$dtmf]);
            }
        } elseif ($action->type == 'input') {
            if ($dtmf == null) {
                $next = $action;
            } else {
                $next = Action::find($action->next);
            }
        } else {
            $next = Action::find($action->next);
        }

        if ($next) {
            Log::info('$next');
            Log::info($next);

            // Let's pay here
            if ($next->type == 'payment') {
                $answers = Answer::where('conversation_uuid', $conversation_uuid)->get();
                $descriptions = [];
                $total = 0;

                foreach ($answers as $answer) {
                    if ($answer->action_id == 5) { // hamburger
                        $price = 5.95;
                        $description = $answer->title . ' x ' . $answer->dtmf;
                        $descriptions[] = $description;
                        $total += $price * $answer->dtmf;
                    } else if ($answer->action_id == 8) { // cheeseburger
                        $price = 6.95;
                        $description = $answer->title . ' x ' . $answer->dtmf;
                        $descriptions[] = $description;
                        $total += $price * $answer->dtmf;
                    }else if ($answer->action_id == 10) { // small fries
                        $price = 2.5;
                        $description = $answer->title . ' x ' . $answer->dtmf;
                        $descriptions[] = $description;
                        $total += $price * $answer->dtmf;
                    }else if ($answer->action_id == 11) { // large fries
                        $price = 3.5;
                        $description = $answer->title . ' x ' . $answer->dtmf;
                        $descriptions[] = $description;
                        $total += $price * $answer->dtmf;
                    }else if ($answer->action_id == 13) { // coke
                        $price = 1.5;
                        $description = $answer->title . ' x ' . $answer->dtmf;
                        $descriptions[] = $description;
                        $total += $price * $answer->dtmf;
                    }else if ($answer->action_id == 14) { // beer
                        $price = 4;
                        $description = $answer->title . ' x ' . $answer->dtmf;
                        $descriptions[] = $description;
                        $total += $price * $answer->dtmf;
                    }
                }

                $controller = new NotificationController();
                $title = implode(', ', $descriptions);
                $controller->createPayment($total, $title);

                $ncco = [
                    [
                        'action' => 'talk',
                        'text' => "Your total is £{$total}. Please check your Smart calls mobile app to make the payment and your order will be dispatched. Thanks for calling."
                    ],
                ];
                return response()->json($ncco);
            }

            $ncco = $next->ncoo;
            return response()->json($ncco);
        }
        return 'OK';
    }
}
