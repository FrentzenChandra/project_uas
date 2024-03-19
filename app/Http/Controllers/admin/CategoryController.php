<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CloudinaryStorage;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    function index(){
        return view('admin.category.index',['category'=>Category::get()]);
    }

    function add(){
        return view('admin.category.add_category');
    }

    function added(request $req){

        $req->validate([
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);


        if($req->hasFile('img')){
            $file = $req->file('img');
            $result = CloudinaryStorage::upload($file->getRealPath(), $file->getClientOriginalName()); 
            Category::updateOrCreate([
            'name'=>$req->name,
            'slug'=>$req->slug,
            'description'=>$req->description,
            'status'=>$req->status,
            'popular'=>$req->popular,
            'meta_title'=>$req->meta_title,
            'meta_descrip'=>$req->meta_descrip,
            'meta_keywords'=>$req->meta_keywords,
            'img'=>$result,]);
        }else{
           Category::updateOrCreate([
            'name'=>$req->name,
            'slug'=>$req->slug,
            'description'=>$req->description,
            'status'=>$req->status,
            'popular'=>$req->popular,
            'meta_title'=>$req->meta_title,
            'meta_descrip'=>$req->meta_descrip,
            'meta_keywords'=>$req->meta_keywords,
        ]); 
        }

        
        Alert::success('Success', 'Insert Data Success');
        return redirect('/category');
        
    }

   
    function edit($id){
        $category = Category::where('id',$id)->get();
        return view('admin.category.add_category',compact('category'));
    }

    function edited(REQUEST $req){
        $category = Category::where('id',$req->id)->get();
        $data = Category::find($req->id);
        

        $req->validate([
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if($req->hasFile('img')){

            // Jika ada file img yang diamsukan lagi maka delete dan create
            if($req->img !== null){
            CloudinaryStorage::delete($category[0]->img);   
            }



            $file = $req->file('img');
            $result = CloudinaryStorage::upload($file->getRealPath(), $file->getClientOriginalName()); 
            $data->update([
            'name'=>$req->name,
            'slug'=>$req->slug,
            'description'=>$req->description,
            'status'=>$req->status,
            'popular'=>$req->popular,
            'meta_title'=>$req->meta_title,
            'meta_descrip'=>$req->meta_descrip,
            'meta_keywords'=>$req->meta_keywords,
            'img'=>$result,]);
        }else{
           $data->update([
            'name'=>$req->name,
            'slug'=>$req->slug,
            'description'=>$req->description,
            'status'=>$req->status,
            'popular'=>$req->popular,
            'meta_title'=>$req->meta_title,
            'meta_descrip'=>$req->meta_descrip,
            'meta_keywords'=>$req->meta_keywords,
           ]);
        }

        Alert::success('Success', 'Edit Data Success');
        return redirect('/category');
        
    }

    
    
    function delete($id){
        // Ini digunakan untuk mendelete sebuah image yang ada di cloudinary 
        $category = Category::where('id',$id)->get();
        if($category[0]->img !== null){
         CloudinaryStorage::delete($category[0]->img);   
        }
        
        Category::where('id',$id)->delete();
        Alert::success('Success', 'Delete Data Success');
        
        return redirect('/category');
    }   

}
