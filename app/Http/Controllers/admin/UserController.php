<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function index(){
        $users = User::all();

        return view('admin.user.index',compact('users'));
    }

    function detail($id){
        $user = User::where('id',$id)->get();
        return view('admin.user.detail',compact('user'));
    }
}
