<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    function index($id){
        $alreadyReview = Review::where('user_id',auth()->user()->id)->where('product_id',$id)->get();
        $product = Product::where('id',$id)->get();
        $orders = Order::where('user_id',auth()->user()->id)
        ->where('status',"Completed")
        ->get();
        $reviews = Review::where('product_id',$id)->get();

        $total_star = 0;

        if(count($reviews)> 0){

            foreach($reviews as $review){
                $total_star += $review->star;
            }  

            $total_star = round($total_star/count($reviews));  
        
        }
        

        $orderItems = OrderItem::where('order_id',$orders[0]->id)->where('product_id',$id)->get();
        return view('frontend.product.productDetail',compact('product','orderItems','alreadyReview','reviews','total_star'));
        
    }

}
