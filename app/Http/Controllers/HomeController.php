<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function status(){
        $cart_length = Cart::where('user_id',Auth::id())->get();
        $wishlist_length = Wishlist::where('user_id',Auth::id())->get();

        return response()->json(['cart_count' => count($cart_length), 'wishlist_count' =>count($wishlist_length)]);
    }
}
