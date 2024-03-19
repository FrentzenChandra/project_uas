<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(){
        $feature_product = Product::where('trending','yes')->take(15)->get();
        $trending_category = Category::where('popular','Very Popular')->take(15)->get();
        return view('frontend.index',compact('feature_product','trending_category'));
    }

    public function productByCategory($name){
        $products = Product::join('categories','product.category_id','=','categories.id')
        ->select('product.*','categories.name as category')
        ->where('categories.name',$name)
        ->get();
        return view('frontend.product.productsByCategory',compact('products'));
    }

}
