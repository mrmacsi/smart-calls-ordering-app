<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;
use Illuminate\Support\Facades\Log;
use SaasPayments\SaasPayments;
use SaasPayments\Setup;
use SaasPayments\Payment;
use SaasPayments\Refund;

class NotificationController extends Controller
{
    private $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    private $user_token = 'dA-AXT7oc9k:APA91bFSbTV57TDfHyLTWog6ti_L7UvVA3DCpqxnCMMZH91gnQS9D2BggflrOow0pz12tPK5RvlBUE3hSN6tgInsG_ydSjH6M-DissO2Nu959-u9ZpsNDZe-91mKs_7G_77nmW8j0kj8';
    private $server_key = 'AAAAYTHA2J0:APA91bHp4lSB8aWFNF8Xt-_dU4bUPIOR3hnIwkDPixZRb0MIl7IOdrvpev5ZOi3fR_V-kh6U8gUF7-HvnaO5Xtqw497PJcA0bt2ANcfgtN_GTmeT0b8qWXn3ll-f9N9ITXtdKKUQseEo';

    public function test()
    {
        return $this->createPayment(rand (10*10, 50*10) / 10,
        "Burger Store Order: 1x Cheeseburger, 2x Hamburger, 1x French Fries, 1x Coke");
    }

    public function createPayment($amount,$title)
    {
        $settings = [
            "shared_key" => "1186_90441",
            "secret_key" => "d2a90e33eba33c48f71210ce97bcd6ec"
        ];

        $payment = new Payment($settings);

        $options = [
            "instance_key" => "9191919191",
            "title" => $title,
            "currency" => "GBP",
            "amount" => $amount,
            "alt_key" => "test1231231dd",
            "account" => [
                "alt_key" => "2133212343"
            ],
            "success_url" => route('paymentSuccess')
            ];

        $payment_url = $payment->paymentUrl($options);

        $this->sendPaymentNotification($payment_url);
    }

    public function sendPaymentNotification($url)
    {
        $notification = [
            'PAYMENT_URL' => $url,
            'sound' => true,
        ];

        $fcmNotification = [
            'to'        => $this->user_token, //single token
            'notification' => $notification,
            'data' => ['PAYMENT_URL' => $url]
        ];

        $headers = [
            'Authorization: key='.$this->server_key,
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function sendPaymentSuccessfulNotification()
    {
        $notification = [
            'STATUS' => "DONE",
            'sound' => true,
        ];

        $fcmNotification = [
            'to'        => $this->user_token, //single token
            'notification' => $notification,
            'data' => ['STATUS' => "DONE"]
        ];

        $headers = [
            'Authorization: key='.$this->server_key,
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        $c = new SMSController();
        $c->thanks();

        return $result;
    }
}
