<?php

namespace App\Http\Controllers;

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $real_mid = "123146326761544";
    private $Authorization_Code = "L0115509689599ISMrHE4LHfAhL6tgJV6PHYdHZKaSbKPGTVvB";
    public function test()
    {
        // Prep Data Services
        $dataService = DataService::Configure(array(
            'auth_mode' => 'oauth2',
            'ClientID' => "L0GJKV8ubdRriWSZpdJcaLFR3UyRLHTTbUOyfn9JVHWpqYrIw9",
            'ClientSecret' => "i5OzER7JOg8RGFn5KwGdIOfrMIDBcODomNwtGYii",
            'RedirectURI' => "http://localhost:8000/invoiceCallback",
            'scope' => "com.intuit.quickbooks.accounting",
            'baseUrl' => "http://localhost:8000"
        ));
        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();  
        $authorizationCodeUrl = $OAuth2LoginHelper->getAuthorizationCodeURL();
        return redirect($authorizationCodeUrl);
    }

    public function invoiceCallback(Request $request)
    {
        $this->Authorization_Code = $request['code'];
        $this->real_mid = $request['realmId'];

        $dataService = DataService::Configure(array(
            'auth_mode' => 'oauth2',
            'ClientID' => "L0GJKV8ubdRriWSZpdJcaLFR3UyRLHTTbUOyfn9JVHWpqYrIw9",
            'ClientSecret' => "i5OzER7JOg8RGFn5KwGdIOfrMIDBcODomNwtGYii",
            'RedirectURI' => "http://localhost:8000/invoiceCallback",
            'scope' => "com.intuit.quickbooks.accounting",
            'baseUrl' => "http://localhost:8000"
        ));
        $OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

        $accessTokenObj = $OAuth2LoginHelper
        ->exchangeAuthorizationCodeForToken($this->Authorization_Code, $this->real_mid);
        $dataService->updateOAuth2Token($accessTokenObj); 
        $accessTokenValue = $accessTokenObj->getAccessToken();
        $refreshTokenValue = $accessTokenObj->getRefreshToken();
        $dataService = DataService::Configure(array(
            'auth_mode' => 'oauth2',
            'ClientID' => "L0GJKV8ubdRriWSZpdJcaLFR3UyRLHTTbUOyfn9JVHWpqYrIw9",
            'ClientSecret' => "i5OzER7JOg8RGFn5KwGdIOfrMIDBcODomNwtGYii",
            'accessTokenKey' => $accessTokenValue,
            'refreshTokenKey' => $refreshTokenValue,
            'QBORealmID' => $this->real_mid,
            'baseUrl' => "http://localhost:8000"
       ));

       $dataService->throwExceptionOnError(true);
        //Add a new Invoice
        $theResourceObj = Invoice::create([
            "Line" => [
            [
                "Amount" => 100.00,
                "DetailType" => "SalesItemLineDetail",
                "SalesItemLineDetail" => [
                "ItemRef" => [
                    "value" => 1,
                    "name" => "Services"
                ]
                ]
            ]
            ],
            "CustomerRef"=> [
                "value"=> 1
            ],
            "BillEmail" => [
                "Address" => "Familiystore@intuit.com"
            ],
            "BillEmailCc" => [
                "Address" => "a@intuit.com"
            ],
            "BillEmailBcc" => [
                "Address" => "v@intuit.com"
            ]
        ]);
        $resultingObj = $dataService->Add($theResourceObj);
        $error = $dataService->getLastError();
        if ($error) {
            echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
            echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
            echo "The Response message is: " . $error->getResponseBody() . "\n";
        }
        else {
            echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
            $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
            echo $xmlBody . "\n";
        }
    }
}
