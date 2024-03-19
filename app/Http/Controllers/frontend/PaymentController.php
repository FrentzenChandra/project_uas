<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{


    function pay(Request $req){
                
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $req->total_price,
            ),
            'customer_details' => array(
                'first_name' => $req->first_name,
                'last_name' => $req->last_name,
                'email' => $req->email,
                'phone' => $req->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

    

        return response()->json(['status'=>'Wishlist Has been Deleted','snap_token'=>$snapToken]);
        }
}
