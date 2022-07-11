<?php

namespace App\Http\Controllers;

use App\Models\HostelAssign;
use App\Models\HostelCategory;
use GuzzleHttp\Client;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class PayStackPaymentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }



    public function MakePayment($id)
    {
        $hostelCategory = HostelCategory::with(['hostels', 'hostels.hostelAssigns'])->find($id);
        // try {

            if(!($hostelCategory instanceof HostelCategory)){
                return redirect()->back()->with('error', 'please choose hostel category!' );
            }

            //if this hostelcategory is not for your gender
            if(!checkGender($hostelCategory, auth()->user())){
                return redirect()->back();
            }

            //allocate hostel
            $hostel =  geneticAlgo($hostelCategory);

            if(!$hostel){
                return redirect()->back();
            }

            $ref = Str::random(2) . (random_int(100, 900) . Str::random(3)) . date("dmYhis");

            $http = new Client();
            $url = "https://api.paystack.co/transaction/initialize";

            $response = $http->post($url, [
                'json' => [
                    "email" => auth()->user()->email,
                    "currency" => "NGN",
                    "amount" => (int)$hostelCategory->amount * 100,
                    "reference" => $ref,
                    "callback_url" => route('student.paystack.verifypayment')
                ],
                'headers' => [
                    "Authorization" => config('app.paystack_key'),
                    "Cache-Control" =>  "no-cache",
                ]
            ]);
            $response = json_decode($response->getBody());

            // dd($response);
            if (!$response->status) {
                print_r('API returned error: ' . $response->message);
            } else {

                $order_no = (random_int(1000, 9000) . Str::random(4) . rand(100, 900) . Str::random(5)) . date("dmYhis");

                $transaction = new Transaction();
                $transaction->user_id = auth()->user()->id;
                $transaction->hostel_id = $hostel->hostel_id;
                $transaction->amount = $hostelCategory->amount;
                $transaction->order_no = $order_no;
                $transaction->payment_method = "PayStack";
                $transaction->payment_ref = $ref;
                $transaction->status = "PENDING";
                $transaction->save();

                // redirect to page so User can pay
                // uncomment this line to allow the user redirect to the payment page
                return redirect($response->data->authorization_url);
                // header('Location: ' . $response['data']['authorization_url']);
            }
        // } catch (Exception $ex) {
        //     return redirect()->back()->with('error', $ex->getMessage());
        // }
    }

    public function PayStackVerifyPayment(Request $request)
    {
        // dd($request);
        $reference = $request->reference;
        $transaction = Transaction::where("payment_ref", $reference)->first();


        if (!$reference) {
            die('No reference supplied');
        }

        $http = new Client();
        $url = "https://api.paystack.co/transaction/verify/" . rawurlencode($reference);
        $response = $http->get($url, [
            'headers' => [
                "Accept" => "application/json",
                "Authorization" => config('app.paystack_key'),
                "Cache-control" => "no-cache"
            ]
        ]);
        $response = json_decode($response->getBody());

        if (!$response->status) {
            print_r('API returned error: ' . $response->message);
        }

        if ('success' == $response->data->status && ($transaction->count() > 0) && $transaction->status == "PENDING" && (auth()->user()->id == $transaction->user_id)) {
            // transaction was successful...
            // let check other things like whether we have already gave value for this ref
            // if the email matches the customer who owns the product etc
            // Give value
            $transaction->status = "COMPLETED";
            $transaction->save();

            // hostelAssign status to 1
            HostelAssign::where('user_id', $transaction->user_id)->update(['status' => 1]);

            // return redirect('/')->with('status', 'Payment was successful');
            return redirect('/')->with('status', 'Payment was successful,! check your profile in dashboard to view hostel assigned to you.');
        } else {

            // update transaction status
            $transaction->status = "FAILED";
            $transaction->save();

            return redirect('/')->with('error', 'Payment failed the verification');
        }
    }

}

