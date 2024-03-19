@extends('layouts.front')

@section('content')
<div class=" text-light  rounded">
 <div class="row bg-primary">
  <div class="col ">
   <h4 class="text-center my-auto py-2 fw-bold">My Orders</h4>
  </div>
 </div>
 <div class="row border p-3">
  <div class="col ">
    <table class="table border table-striped">
    <thead>
        <tr>
         <th>Date</th>
         <th>Tracking Number</th>
         <th>Total Price</th>
         <th>Status</th>
         <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($orders) > 0 )
        @foreach($orders as $order)
        <tr>
         <td>{{$order->date}}</td>
         <td>{{$order->tracking_number}}</td>
         <td><span class="autoNumeric">{{$order->total_price}}</span></td>
         <td>{{$order->status}}</td>
         <td><a href="/order/detail/{{$order->id}}" class="btn btn-success">Detail</a></td>
        </tr>
        @endforeach
        @else
        <tr>
          <td colspan="5" class="text-center fs-6 fw-bold">You haven't ordered yet</td>
        </tr>
        @endif
    </tbody>
    </table> 
  </div>
 </div>
</div>


@endsection