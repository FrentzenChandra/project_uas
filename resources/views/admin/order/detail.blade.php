@extends('layouts.front')

@section('content')

<div class="container mt-5 ">
 <div class="row mb-4">
  <div class="col-7">
   <div class="row">
    <div class="col">
     Basic Detail
     <hr>
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="first_name" class="d-block mb-2">First Name</label>
    <input required type="text" disabled class="form-control" id="first_name" name="first_name" value="{{$orders[0]->name}}">
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="last_name" class="d-block mb-2">Last Name</label>
    <input required type="text" disabled class="form-control" id="last_name" name="last_name" value="{{$orders[0]->last_name}}">
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="email" class="d-block mb-2">Email</label>
    <input required type="text" disabled class="form-control" id="email" name="email" value="{{$orders[0]->email}}">
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="contact_no" class="d-block mb-2">Contact No.</label>
    <input required type="text" disabled class="form-control" id="contact_no" name="contact_no" value="{{$orders[0]->phone}}">
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="address" class="d-block mb-2">Address</label>
    <input required type="text" disabled class="form-control" id="address" name="address" value="{{$orders[0]->address1}},{{$orders[0]->city}},{{$orders[0]->country}}">
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="tracking_no" class="d-block mb-2">Tracking No</label>
    <input required type="text" disabled class="form-control" id="tracking_no" name="tracking_no" value="{{$orders[0]->tracking_number}}">
    </div>
   </div>
   

  </div>
  <div class="col-5">
   <div class="row">
    <div class="col">
     Order Details 
     <hr>
    </div>
   </div>
   <div class="row">
    <div class="col">
     <table class="table table-bordered">
        <thead>
         <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Image</th>
         </tr>
        </thead>
        <tbody>
        @foreach($orderItems as $orderItem)
         <tr>
            <td>{{$orderItem->product->name}}</td>
            <td><span>{{$orderItem->qty}}</span></td>
            <td><span class="autoNumeric">{{$orderItem->product->selling_price}}</span></td>
            <td><img src="{{$orderItem->product->img}}" alt="" width="100px"></td>
         </tr>
         @endforeach
        </tbody>
     </table>
    </div>
   </div>
   <hr>
   <div class="row">
    <div class="col-8"> 
        <p >Total Price : <span class="autoNumeric fw-bold">{{$orders[0]->total_price}}</span></p>
    </div>
    <div class="col-4 d-flex">
        <input type="hidden" value="1" name="save" id="save" >
        <button class="btn btn-danger" style="cursor: default;">{{$orders[0]->status}}</button>
    </div>
   </div>

   <div class="row mt-5">
    <div class="col">
        <form action="/order/completed/{{$orders[0]->id}}" method="post">
        {{ csrf_field() }}
         <label class="mb-3" for="status">Order Status</label>
         <select name="status" id="status" class="form-control">
          <option value="Completed">Completed</option>
          <option value="Pending">Pending</option>
         </select>
         <button class="btn btn-success mt-4 ml-auto">Submit</button>
        </form>
    </div>
   </div>
  </div>
 </div>  


</div>

<script>
    
    if(!$lanjut){
        document.querySelector('.order-button').classList.add('disabled')
    }
    function apakahMauSave(){
        Swal.fire({
            title: "Do you want to save This Address?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                 Swal.fire("Saved!", "", "success");
                 document.getElementById('save').value=2; 
                 document.getElementById('formDetailAddress').submit();
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
                 document.getElementById('save').value=1; 
                 document.getElementById('formDetailAddress').submit();

            }
           
            });
        
            
    }
</script>

@endsection