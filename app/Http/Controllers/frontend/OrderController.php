<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function index(){
        $orders = Order::select(
    DB::raw('DATE(order.created_at) as date'),
    'order.tracking_number',
    'order.total_price',
    'order.status',
    'order.id',
    
)->where('user_id',auth()->user()->id)
->get();

        
        return view('frontend.order.index',compact('orders'));
    }


    function detail($id){
        $orders = Order::where('id',$id)->get();
        $orderItems = OrderItem::where('order_id',$id)->get();
        return view('frontend.order.detail',compact('orderItems','orders') );
    }


}
