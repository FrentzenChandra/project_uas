<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    function slug(){
        $products = Product::get();
        $slug ;

        for($i = 0 ; $i<count($products); $i++){
            $slug[$i] = $products[$i]->slug;
        };

         return response()->json(['slug'=>$slug]);
    }

    function search(Request $req){
        $products = Product::where('slug',$req->slug)->get();
        return redirect('product_detail/'.$products[0]->id);
    }

    
}
