<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function index(Request $request)
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('34baa012', 'mxsjOxJJVrY06Uni');
        $client = new \Nexmo\Client($basic);

        $client->message()->send([
            'to' => '+447453533740',
            'from' => 'Smart Calls',
            'text' => 'A text message sent using the Nexmo SMS API'
        ]);
    }

    public function thanks()
    {
        $basic  = new \Nexmo\Client\Credentials\Basic('34baa012', 'mxsjOxJJVrY06Uni');
        $client = new \Nexmo\Client($basic);

        $order = random_int(2500, 9999);

        $client->message()->send([
            'to' => '+447453533740',
            'from' => 'BurgerStore',
            'text' => "Thanks for your payment. Order number: #{$order}"
        ]);
    }
}
