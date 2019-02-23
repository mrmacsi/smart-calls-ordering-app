<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;
use SaasPayments\SaasPayments;
use SaasPayments\Setup;
use SaasPayments\Payment;
use SaasPayments\Refund;

class NotificationController extends Controller
{
    private $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    private $user_token = 'fQRZ2H7l3Bg:APA91bHf-UQHlGB-TcnziAPMgJgHvyELYBvrzfylCzipKP7vcuaioEcmLduGwElylysMumiZi6H8FH8QS4rFZmD4U5yCPL3hO79CPAp4cQ2s_gzVG47W_1wXRn8qOr51K5RsWEPvRwjS';
    private $server_key = 'AAAAYTHA2J0:APA91bHp4lSB8aWFNF8Xt-_dU4bUPIOR3hnIwkDPixZRb0MIl7IOdrvpev5ZOi3fR_V-kh6U8gUF7-HvnaO5Xtqw497PJcA0bt2ANcfgtN_GTmeT0b8qWXn3ll-f9N9ITXtdKKUQseEo';
    
    public function test()
    {
        return $this->createPayment(rand (10*10, 50*10) / 10);
    }

    public function createPayment($amount)
    {
        $settings = [
            "shared_key" => "1186_90441",
            "secret_key" => "d2a90e33eba33c48f71210ce97bcd6ec"
        ];

        $payment = new Payment($settings);

        $options = [
            "instance_key" => "9191919191",
            "title" => "macit kebap ltd",
            "channelTitle" => "macit kebap ltd",
            "currency" => "GBP",
            "amount" => $amount, 
            "alt_key" => "test1231231dd",
            "account" => [],
            "success_url" => "http://d12d109c.ngrok.io/paymentSuccess"
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
    
        return $result;
    }
}
