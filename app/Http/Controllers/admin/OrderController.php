<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    function index(){
        $orders = Order::select(
    DB::raw('DATE(order.created_at) as date'),
    'order.tracking_number',
    'order.total_price',
    'order.status',
    'order.id',)->where('status','Pending')->get();
    
        return view('admin.order.index',compact('orders'));
    }

    function history(){
        $orders = Order::select(
    DB::raw('DATE(order.created_at) as date'),
    'order.tracking_number',
    'order.total_price',
    'order.status',
    'order.id',)->where('status','Completed')->get();

    return view('admin.order.index',compact('orders'));
    }

    function detail($id){
        $orders = Order::where('id',$id)->get();
        $orderItems = OrderItem::where('order_id',$id)->get();
        return view('admin.order.detail',compact('orderItems','orders') );
    }

    function edit($id,REQUEST $req){
        $data = Order::find($req->id);
        $data->update([
            'status' => $req->status,
        ]);
        Alert::success('Success','Order edited Successfully');
        return redirect('/order_admin');
    }

}
