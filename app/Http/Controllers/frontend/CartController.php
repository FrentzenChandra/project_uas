<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    function index(){
        $products = Cart::where('user_id',Auth::id())->get();
        
        return view('frontend.cart.index',compact('products'));
    }

    function addProduct(Request $req){
        $product_id = $req->product_id;
        $product_qty = $req->product_qty;
        $exitsCart = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists();
        if(Auth::check()){
            if(!$exitsCart){
            DB::table('cart')->insert([
            'product_id'=>$product_id,
            'qty'=>$product_qty,
            'user_id'=>Auth::id(),
            ]);
            }else {
                 $oldDataCart = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->get();
                //  Log::info($oldDataCart[0]->qty);
                //  Log::info(json_encode($oldDataCart)); 
                if(($oldDataCart[0]->qty + $product_qty) <= $req->stock){
                    $oldDataCart[0]->update([
                        'qty' => (($oldDataCart[0]->qty) + $product_qty),
                    ]);
                }else{
                    return response()->json(['status'=>'You Have Reached The maximum stock of this Product in Your Cart!!!']);
                }
            }
            
            return response()->json(['status'=>'Product Added']);
        }else{
            return response()->json(['status'=>'You Need To login first']);
        }
    }

    function update(Request $req){
        $product_qty = $req->productQty;
        $cart_id = $req->cartId;

        $data = Cart::find($cart_id)->update([
            'qty'=>$product_qty,
        ]);
        // Log::info($data);
    }

    function delete(Request $req){
        Cart::where('id',$req->cart_id)->delete();
        return response()->json(['status'=>'Cart Deleted']);
    }
}
