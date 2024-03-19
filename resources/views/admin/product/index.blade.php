@extends('layouts.admin')

@section('content')


<table class="table overflow-auto">
 <div class="d-flex justify-content-between">
 <h4 class="d-inline">{{Route::current()->getName();}}</h4> 
 <a class="btn btn-success shadow " href="{{url('/product/add')}}"  ><span class="m-auto">Add Product</span></a>
 </div>
 
 
 <thead>
  <tr>
   <td>Name</td>
   <td>Description</td>
   <td>Original_Price</td>
   <td>Selling_Price</td>
   <td>Category</td>
   <td>Image</td>
   <td></td>
  </tr>
 </thead>
 <tbody>
  @if(isset($product))
  @foreach($product as $data)
  <tr class="max-height-150">
   <td>{{$data->name}}</td>
   <td style="white-space:normal; "><div class="box"><p class="countParawords">{{$data->description}}</p></div></td>
   <td class="autoNumeric">{{$data->original_price}}</td>
   <td class="autoNumeric">{{$data->selling_price}}</td>
   <td>{{$data->category->name}}</td>
   <td><img src="{{$data->img}}" alt="" class="img-show"></td>
   <td class="" >
    <div class="row mt-3" >
     <a class="btn btn-warning shadow" href="product/edit/{{$data->id}}">Edit</a>
     <a class="btn btn-danger shadow" href="product/delete/{{$data->id}}" onclick="confirm('Are you Going To delete this Item?')">Delete</a>   
    </div>
   </td>
  </tr>
  @endforeach
  @endif
 </tbody>
</table>

@endsection