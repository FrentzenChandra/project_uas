@extends('layouts.admin')

@section('content')

<table class="table overflow-auto">
 <div class="d-flex justify-content-between">
 <h4 class="d-inline">{{Route::current()->getName();}}</h4> 

 </div>
 
 
 <thead>
  <tr>
   <td>Id</td>
   <td>Name</td>
   <td>Email</td>
   <td>Phone</td>
   <td></td>
  </tr>
 </thead>
 <tbody>
  @if(count($users) > 0 )
  @foreach($users as $user)
   <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->phone}}</td>
    <td><a class="btn btn-success" href="user/{{$user->id}}">Detail</a></td>
   </tr>
  @endforeach
  @else
  <tr>
   <td colspan="5" class="text-center"><h5 class="fs-3">NO DATA</h5></td>
  </tr>
  
  @endif
 </tbody>

</table>

@endsection