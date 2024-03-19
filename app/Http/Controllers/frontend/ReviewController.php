<?php

namespace App\Http\Controllers\frontend;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    function add(Request $req){
        Review::create([
            'user_id'=> auth()->user()->id,
            'product_id'=> $req->product_id,
            'star'=> $req->star,
            'review_description'=> $req->review_description,
        ]);
        return ;
    }
}
