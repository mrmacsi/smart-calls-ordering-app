<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;
use Illuminate\Http\Request;
use Session;

class InvoiceController extends Controller
{
    private $real_mid = "123146326761544";
    private $Authorization_Code = "L011550998938YzolNTX7rxtglWZU3XoODFkRloJRfnfnFfnIB";

    public function invoiceAuth()
    {
        // Prep Data Services
        $dataService = DataService::Configure(array(
            'auth_mode' => 'oauth2',
            'ClientID' => "L0GJKV8ubdRriWSZpdJcaLFR3UyRLHTTbUOyfn9JVHWpqYrIw9",
            'ClientSecret' => "i5OzER7JOg8RGFn5KwGdIOfrMIDBcODomNwtGYii",
            'RedirectURI' => route('setToken'),
            'scope' => "com.intuit.quickbooks.accounting",
            'baseUrl' => "http://localhost:8000"
        ));
        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
        $authorizationCodeUrl = $OAuth2LoginHelper->getAuthorizationCodeURL();
        return redirect($authorizationCodeUrl);
    }

    public function setAccessToken(Request $request)
    {
        $this->Authorization_Code = $request['code'];
        $this->real_mid = $request['realmId'];

        $dataService = DataService::Configure(array(
            'auth_mode' => 'oauth2',
            'ClientID' => "L0GJKV8ubdRriWSZpdJcaLFR3UyRLHTTbUOyfn9JVHWpqYrIw9",
            'ClientSecret' => "i5OzER7JOg8RGFn5KwGdIOfrMIDBcODomNwtGYii",
            'RedirectURI' => route('setToken'),
            'scope' => "com.intuit.quickbooks.accounting",
            'baseUrl' => "http://localhost:8000"
        ));
        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

        $accessTokenObj = $OAuth2LoginHelper
        ->exchangeAuthorizationCodeForToken($this->Authorization_Code, $this->real_mid);
        $dataService->updateOAuth2Token($accessTokenObj);
        $accessTokenValue = $accessTokenObj->getAccessToken();
        Cache::forever('access_token', $accessTokenValue);
        return $accessTokenValue;
    }

    public function test()
    {
        $this->createInvoice(rand (10*10, 50*10) / 10,
        "Burger Store Order: 1x Cheeseburger, 2x Hamburger, 1x French Fries, 1x Coke");
    }

    public function createInvoice($amount,$title)
    {
        $access_token = Cache::get('access_token');
        $headers = [
            'Authorization: Bearer '.$access_token,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://sandbox-quickbooks.api.intuit.com/v3/company/123146326761544/invoice?minorversion=4");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            "Line" => [
              [
                "Description" => $title,
                "Amount" => $amount,
                "DetailType" => "SalesItemLineDetail",
                "SalesItemLineDetail" => [
                  "ItemRef" => [
                    "value" => 1,
                    "name" => "Order"
                  ]
                ]
              ]
            ],
            "CustomerRef" => [
                "value" => "1",
                "name" => "Alex"
            ]
          ]));
        $result = curl_exec($ch);
        curl_close($ch);
       return $result;
    }
}
