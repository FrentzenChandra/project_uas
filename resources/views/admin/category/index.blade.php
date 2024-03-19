@extends('layouts.admin')

@section('content')

<table class="table overflow-auto">
 <div class="d-flex justify-content-between">
 <h4 class="d-inline">{{Route::current()->getName();}}</h4> 
 <a class="btn btn-success shadow " href="{{url('/category/add')}}"  ><span class="m-auto">Add Category</span></a>
 </div>
 
 
 <thead>
  <tr>
   <td>Name</td>
   <td>Description</td>
   <td>Image</td>
   <td></td>
  </tr>
 </thead>
 <tbody>
  @if(isset($category))
  @foreach($category as $data)
  <tr>
   <td>{{$data->name}}</td>
   <td style="white-space: nowrap"><div class="box"><p class="countParawords">{{$data->description}}</p></div></td>
   <td><img src="{{$data->img}}" alt="" class="img-show"></td>
   <td class="" >
    <div class="row mt-3" >
     <a class="btn btn-warning shadow" href="category/edit/{{$data->id}}">Edit</a>
     <a class="btn btn-danger shadow" href="category/delete/{{$data->id}}" onclick="confirm('Are you Going To delete this Item?')">Delete</a>   
    </div>
   </td>
  </tr>
  @endforeach
  @endif
 </tbody>

</table>

@endsection