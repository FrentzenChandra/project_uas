<?php

namespace App\Http\Controllers\frontend;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    function index(){
        $wishlists = Wishlist::where('user_id',Auth::id())->get();

        return view('frontend.wishlist.index',compact('wishlists'));
    }

    function add(Request $req){
        $product_id = $req->product_id;
        $user_id = Auth::id();
        $wishlist = Wishlist::where('user_id',$user_id)->where('product_id',$product_id)->exists();
        if(!($wishlist)){
            Wishlist::create([
                'user_id' => $user_id,
                'product_id'=> $product_id
                ]);
            return response()->json(['status'=>'Product Added To Wishlist !!!']);
        }else{
            return response()->json(['status'=>'The product is already on the List !!!']);
        }
    }

    function delete(Request $req){
        Wishlist::where('id',$req->wishlist_id)->delete();

        return response()->json(['status'=>'Wishlist Has been Deleted']);
    }
}
