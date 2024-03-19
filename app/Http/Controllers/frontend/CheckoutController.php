<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CheckoutController extends Controller
{
    function index(){
        $carts = Cart::where('user_id',Auth::id())->get();
        $totalPrice = 0;
        foreach($carts as $cart){
            $totalPrice += $cart->product->selling_price * $cart->qty;
        }
        $user = auth()->user();
        return view('frontend.checkout.index',compact('carts','totalPrice','user'));
    }

    function saveAddress(Request $req){
        $carts = Cart::where('user_id',Auth::id())->get();
        if($req->save == 2){
            User::where('id',Auth::id())->update([
                'name' => $req->first_name,
                'last_name' => $req->last_name,
                'phone' => $req->phone,
                'address1' => $req->address1,
                'address2' => $req->address2,
                'city' => $req->city,
                'state' => $req->state,
                'country' => $req->country,
            ]);
        };
            // Available alpha caracters
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];

            // shuffle the result
            $stringRandom = str_shuffle($pin);

            $order = new Order;
            $order->name = $req->first_name;
            $order->user_id = Auth::id();
            $order->email = $req->email;
            $order->last_name = $req->last_name;
            $order->phone = $req->phone;
            $order->address1 = $req->address1;
            $order->address2 = $req->address2;
            $order->city = $req->city;
            $order->state = $req->state;
            $order->country = $req->country;    
            $order->status = "Pending";
            $order->tracking_number = $stringRandom;
            $order->total_price = 1;
            $order->snap_token= $req->snap_token;
            $order->save();
        
        $totalPrice = 0;
        foreach($carts as $cart){
           $product =  Product::where('id',$cart->product_id)->get();
           $product[0]->update([
            'qty' => (($product[0]->qty) - ($cart->qty)),
           ]);
           $cart->delete();

           OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product[0]->id,
            'qty' => $cart->qty,
            'price' => $product[0]->selling_price,
            'total_price' => ($product[0]->selling_price * $cart->qty),
           ]);
           $totalPrice += $product[0]->selling_price * $cart->qty;



           
        }

        Order::where('id',$order->id)->update([
            'total_price' => $totalPrice,
        ]);
        
        Alert::success('Success', 'Selesai Checkout');
        return redirect('/order/detail/'. $order->id);

    }
}
