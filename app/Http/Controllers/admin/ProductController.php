<?php

namespace App\Http\Controllers\admin;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\CloudinaryStorage;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    function index(){
        $product = Product::all();

        
        return view('admin.product.index',compact('product'));
    }

    function add(){
        return view('admin.product.add_product',['category' => Category::get()]);
    }

    function added(REQUEST $req){
        
        if($req->hasFile('img')){
            $file = $req->file('img');
            $result = CloudinaryStorage::upload($file->getRealPath(), $file->getClientOriginalName()); 
            Product::updateOrCreate([
                'name' => $req->name,
                'category_id'=> $req->category_id,
                'slug'=> $req->slug,
                'qty'=> $req->qty,
                'status'=> $req->status,
                'trending' => $req->trending,
                'description' => $req->description,
                'small_description'=> $req->small_description,
                'original_price'=> $req->original_price,
                'selling_price' => $req->selling_price,
                'tax_percentage' => $req->tax_percentage,
                'meta_title'=>$req->meta_title,
                'meta_descrip'=>$req->meta_descrip,
                'meta_keywords'=>$req->meta_keywords,
                'img'=> $result,
            ]);
        }else{
            Product::updateOrCreate([
                'name' => $req->name,
                'category_id'=> $req->category_id,
                'slug'=> $req->slug,
                'qty'=> $req->qty,
                'status'=> $req->status,
                'trending' => $req->trending,
                'description' => $req->description,
                'small_description'=> $req->small_description,
                'original_price'=> $req->original_price,
                'selling_price' => $req->selling_price,
                'tax_percentage' => $req->tax_percentage,
                'meta_title'=>$req->meta_title,
                'meta_descrip'=>$req->meta_descrip,
                'meta_keywords'=>$req->meta_keywords,
            ]);
        }



        Alert::success('Success','New Product Added Successfully');
        return redirect('/product');
    }

    function edit($id){
        $product = Product::join('categories','product.category_id','categories.id')
        ->select('product.*','categories.name as category')
        ->where('product.id',$id)
        ->get();
        return view('admin.product.add_product',['product' => $product,'category' => Category::get()]);
    }

    function edited(Request $req){
        $product = Product::where('id',$req->id)->get();
        $data = Product::find($req->id);
        

        $req->validate([
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if($req->hasFile('img')){

            // Jika ada file img yang diamsukan lagi maka delete dan create
            if($req->img !== null){
            CloudinaryStorage::delete($product[0]->img);   
            }

            $file = $req->file('img');
            $result = CloudinaryStorage::upload($file->getRealPath(), $file->getClientOriginalName()); 
            $data->update([
                'name' => $req->name,
                'category_id'=> $req->category_id,
                'slug'=> $req->slug,
                'qty'=> $req->qty,
                'status'=> $req->status,
                'trending' => $req->trending,
                'description' => $req->description,
                'small_description'=> $req->small_description,
                'original_price'=> $req->original_price,
                'selling_price' => $req->selling_price,
                'tax_percentage' => $req->tax_percentage,
                'meta_title'=>$req->meta_title,
                'meta_descrip'=>$req->meta_descrip,
                'meta_keywords'=>$req->meta_keywords,
                'img'=> $result,]);
        }else{
           $data->update([
            'name' => $req->name,
            'category_id'=> $req->category_id,
            'slug'=> $req->slug,
            'qty'=> $req->qty,
            'status'=> $req->status,
            'trending' => $req->trending,
            'description' => $req->description,
            'small_description'=> $req->small_description,
            'original_price'=> $req->original_price,
            'selling_price' => $req->selling_price,
            'tax_percentage' => $req->tax_percentage,
            'meta_title'=>$req->meta_title,
            'meta_descrip'=>$req->meta_descrip,
            'meta_keywords'=>$req->meta_keywords,
           ]);
        }

        Alert::success('Success','Product edited Successfully');
        return redirect('/product');
        
    }

    function delete($id){
        $product = Product::where('id',$id)->get();
        if($product[0]->img !== null){
         CloudinaryStorage::delete($product[0]->img);   
        }


        Product::where('id',$id)->delete();
        Alert::success('Success','Product Deleted Successfully');
        return redirect('/product');

    }
}
