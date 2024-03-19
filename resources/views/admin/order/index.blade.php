@extends('layouts.admin')

@section('content')

<table class="table overflow-auto">
 <div class="d-flex justify-content-between">
 <h4 class="d-inline">{{Route::current()->getName();}}</h4> 

 </div>
 
 
 <thead>
  <tr>
   <td>Order Date</td>
   <td>Tracking Number</td>
   <td>Total Price</td>
   <td>Status</td>
   <td></td>
  </tr>
 </thead>
 <tbody>
  @if(count($orders) > 0 )
  @foreach($orders as $order)
  <tr>
   <td>{{$order->date}}</td>
   <td style="white-space: nowrap">{{$order->tracking_number}}</td>
   <td class="autoNumeric">{{$order->total_price}}</td>
   <td >{{$order->status}}</td>
   <td class="" >
    <div class="row mt-3" >
     <a class="btn btn-warning shadow" href="/order_admin/detail/{{$order->id}}">Detail</a>
    </div>
   </td>
  </tr>
  @endforeach
  @else
  <tr>
   <td colspan="5" class="text-center"><h5 class="fs-3">NO DATA</h5></td>
  </tr>
  
  @endif
 </tbody>

</table>

<script>
    
$(function (){
    // Ini autoNumeric 
        const inputs = document.querySelectorAll('.autoNumericPrice');
        for(let input of inputs ){
        let anElement = new AutoNumeric(input, {
            currencySymbol: "Rp.",
            allowDecimalPadding: false,
            digitGroupSeparator: " ",
        });
        }
    $('html').on('click',function(){
        
        let qty = document.querySelectorAll('.quantity-field');
        let selling_price = document.querySelectorAll('.selling_price');
        let total_price = 0;
        for(let i = 0 ; i<qty.length ;i++){
            total_price += (selling_price[i].value * qty[i].value);
        }
        document.querySelector('span.total-price').innerText = total_price;

        // Ini autoNumeric 
        const inputs = document.querySelectorAll('.autoNumericPrice');
        for(let input of inputs ){
        let anElement = new AutoNumeric(input, {
            currencySymbol: "Rp.",
            allowDecimalPadding: false,
            digitGroupSeparator: " ",
        });
        }
    })


       

});

</script>
@endsection