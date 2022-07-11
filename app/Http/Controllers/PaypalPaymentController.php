<?php

namespace App\Http\Controllers;

use App\Models\HostelAssign;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Transaction;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaypalPaymentController extends Controller
{
    private $_token = null;
    private $_apiUrl = "https://api-m.sandbox.paypal.com";

    public function __construct() {
        $this->middleware('auth');
    }

    private function _getToken()
    {
        try{
                $http = new Client();
                $url = $this->_apiUrl.'/v1/oauth2/token';

                $response = $http->post($url, [
                    'form_params' => [
                        "grant_type"=>"client_credentials"
                    ],
                    "auth" => [
                        env('PAYPAL_SANDBOX_API_CLIENT_ID'),
                        env('PAYPAL_SANDBOX_API_SECRET')
                    ],
                    'headers' => [
                        "Content-Type" => "application/x-www-form-urlencoded",
                        "Accept-Language" => "en_US"
                    ]
                ]);
                $response = json_decode($response->getBody());
                $this->_token = $response->access_token;
            }catch(Exception $ex){
                return redirect('/')->with('error', $ex->getMessage());
            }
    }

    public function verifypayment($orderId)
    {
        // try{

            if($this->_token === null){
                $this->_getToken();
            }

            if (!$orderId) {
                return redirect('/')->with('error', 'OrderID Not Found');
            }

            $hostelCategory = session()->get('hostelCategory');

            if(!$hostelCategory)
                return redirect('/')->with('error', 'invalid Hostel Category');

            //if this hostelcategory is for your gender
            if(!checkGender($hostelCategory, auth()->user())){
                return redirect()->back();
            }
            //allocate hostel
            $hostel = geneticAlgo($hostelCategory);

            if(!$hostel){
                return redirect()->back();
            }

            $ref = Str::random(2) . (random_int(100, 900) . Str::random(3)) . date("dmYhis");

            // capture payment
            $url = $this->_apiUrl.'/v2/checkout/orders/'.$orderId;
            // Client error: `POST https://api-m.sandbox.paypal.com/v2/checkout/orders/8C357753YR656445Y` resulted in a `404 Not Found` response
            $http = new Client();
            $response = $http->get($url, [
                'headers' => [
                    "Authorization" => "Bearer ".$this->_token,
                    "Content-Type" => "application/json"
                ]
            ]);
            $response = json_decode($response->getBody());

            $transaction = new Transaction();
            $transaction->user_id = auth()->user()->id;
            // convert to Naira
            $transaction->hostel_id = $hostel->hostel_id;
            $transaction->amount = $response->purchase_units[0]->amount->value*500;
            $transaction->order_no = $response->id;
            $transaction->payment_method = "PayPal";
            $transaction->payment_ref = $ref;
            $transaction->status = "PENDING";
            $transaction->save();

            // if status and transaction is found
            if (($response->status == "COMPLETED" || $response->status == "APPROVED")) {



                $transaction->status = $response->status;
                $transaction->save();

                // hostelAssign status to 1
                HostelAssign::where('user_id', $transaction->user_id)->update(['status' => 1]);

                // return redirect('/')->with('status', 'Payment was successful');
                return redirect('/')->with('status', 'Payment was successful,! check your profile in dashboard to view hostel assigned to you.');
            } else {

                // update transaction status
                $transaction->status = "FAILED";
                $transaction->save();

                return redirect('/')->with('error', 'Payment failed the verification, STATUS: '.$response->status);
            }

        // } catch (Exception $ex) {
        //     return redirect('/')->with('error', $ex->getMessage());
        // }
    }

    public function cancelPayment(Request $request)
    {
        return redirect('/')->with('error', 'Payment Cancel');
    }
}
