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
    <form  action="/save/address" method="post" id="formDetailAddress" >
        {{ csrf_field() }}
    <label for="first_name" class="d-block mb-2">First Name</label>
    <input required type="text" class="form-control" id="first_name" name="first_name" value="{{$user->name}}">
    </div>
    <div class="col">
    <label for="last_name" class="d-block mb-2">Last Name</label>
    <input required type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}">
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="email" class="d-block mb-2">Email</label>
    <input required type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
    </div>
    <div class="col">
    <label for="phone" class="d-block mb-2">Phone Number</label>
    <input required type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="address1" class="d-block mb-2">Address 1</label>
    <input required type="text" class="form-control" id="address1" name="address1" value="{{$user->address1}}">
    </div>
    <div class="col">
    <label for="address2" class="d-block mb-2">Address 2</label>
    <input required type="text" class="form-control" id="address2" name="address2" value="{{$user->address2}}">
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="city" class="d-block mb-2">City</label>
    <input required type="text" class="form-control" id="city" name="city" value="{{$user->city}}">
    </div>
    <div class="col">
    <label for="state" class="d-block mb-2">State</label>
    <input required type="text" class="form-control" id="state" name="state" value="{{$user->state}}">
    </div>
   </div>
   <div class="row mb-3">
    <div class="col">
    <label for="country" class="d-block mb-2">Country</label>
    <input required type="text" class="form-control" id="country" name="country" value="{{$user->country}}">
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
     <table class="table table-striped">
        <thead>
         <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Product Image</th>
         </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
         <tr>
            <td class="text-center align-middle"><div>{{$cart->product->name}}</div>@if($cart->product->qty < $cart->qty)<div class="text-danger fw-bold">Stock Have Run Out!!!!</div><script>$lanjut = false</script> @endif</td>
            <td class="text-center align-middle"><span>{{$cart->qty}}</span></td>
            <td class="text-center align-middle"><span class="autoNumeric">{{$cart->product->selling_price}}</span></td>
            <td><img src="{{$cart->product->img}}" alt="" width="100px"></td>
         </tr>
         @endforeach
        </tbody>
     </table>
    </div>
   </div>
   <hr>
   <div class="row">
    <div class="col-7"> 
        <p >Total Price : <span class="autoNumeric fw-bold">{{$totalPrice}}</span></p>
    </div>
    <div class="col-5 d-flex">
        <input type="hidden" value="2" name="save" id="save" >
        <input type="hidden" value="" name="snap_token" id="snap_token">
        <button class="btn btn-success me-3 order-button my-auto" onclick="event.preventDefault()">Procced</button>
    </form>

    <button class="btn btn-primary  btn-bayar my-auto px-4 fw-bold">Pay</button>
    </div>
    
   </div>
  </div>
 </div>  
{{-- href="https://app.sandbox.midtrans.com/payment-links/1705045937963" --}}

</div>
@if(count($carts) > 0)
<script>$lanjut = true</script>
@else
<script>$lanjut = false</script>
@endif

<script>
    
    if(!$lanjut){
        document.querySelector('.order-button').classList.add('disabled');
        document.querySelector('.btn-bayar').classList.add('disabled');
    }

     // For example trigger on button clicked, or any time you need
      var payButton = document.querySelector('.btn-bayar');

    $('.order-button').on('click', function(e){
        let first_name = document.querySelector('#first_name').value;
        let last_name = document.querySelector('#last_name').value;
        let email = document.querySelector('#email').value;
        let phone = document.querySelector('#phone').value;

        $.ajax({
            method: "post",
            data: {
                first_name,
                last_name,
                email,
                phone, 
                total_price: {{$totalPrice}}, 
                _token: '{{csrf_token()}}'},
            url: '/pay',
            success: function (response) {
                document.querySelector('#snap_token').value = `${response.snap_token}`;

                 
            }
        });
        $('#formDetailAddress').submit();
    });

    $('.btn-bayar').on('click', function(e) {
        let first_name = document.querySelector('#first_name').value;
        let last_name = document.querySelector('#last_name').value;
        let email = document.querySelector('#email').value;
        let phone = document.querySelector('#phone').value;
        let address1 = document.querySelector('#address1').value;
        let address2 = document.querySelector('#address2').value;
        let city = document.querySelector('#city').value;
        let state = document.querySelector('#state').value;
        let country = document.querySelector('#country').value;


        

    });
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        
        // customer will be redirected after completing payment pop-up
      });

</script>
@endsection