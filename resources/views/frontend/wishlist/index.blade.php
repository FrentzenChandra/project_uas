@extends('layouts.front')

@section('content')
<style>
  input,
textarea {
  border: 1px solid #eeeeee;
  box-sizing: border-box;
  margin: 0;
  outline: none;
  padding: 10px;
}

input[type="button"] {
  -webkit-appearance: button;
  cursor: pointer;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

.input-group {
  clear: both;
  margin: 15px 0;
  position: relative;
}

.input-group input[type='button'] {
  background-color: #eeeeee;
  min-width: 38px;
  width: auto;
  transition: all 300ms ease;
}

.input-group .button-minus,
.input-group .button-plus {
  font-weight: bold;
  height: 38px;
  padding: 0;
  width: 38px;
  position: relative;
}

.input-group .quantity-field {
  position: relative;
  height: 38px;
  left: -6px;
  text-align: center;
  width: 62px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
}

.button-plus {
  left: -13px;
}

input[type="number"] {
  -moz-appearance: textfield;
  -webkit-appearance: none;
}
</style>

<div class="container py-4 shadow-sm border">

@for($i = 0 ; $i<count($wishlists) ; $i++)
 <div class="row">
  <div class="col-2 d-flex">
    <img class="object-fit-contain w-100" src="{{$wishlists[$i]->product->img}}" alt="">
  </div>
  <div class="col-2 d-flex">
    <h3 class="my-auto w-100" >{{$wishlists[$i]->product->name}}</h3>
  </div>
  <div class="col-2 d-flex ">
    <input type="hidden" class="selling_price" value="{{$wishlists[$i]->product->selling_price}}">
    <h4 class="my-auto"><span class="autoNumeric">{{$wishlists[$i]->product->selling_price}}</span></h4>
  </div>
  <div class="col-2 d-flex ">
    <div class="input-group my-auto">
      <input type="button" value="-" class="button-minus rounded" data-field="quantity">
      <input onkeyup=enforceMinMax(this)  type="number" step="1" max="{{$wishlists[$i]->product->qty}}" value="1" name="quantity" class="quantity-field fs-6 fw-bold" data-id="{{$wishlists[$i]->id}}" data-order="{{$i}}">
      <input type="button" value="+" class="button-plus rounded" data-field="quantity" data-id="{{$wishlists[$i]->id}}">
      @if($wishlists[$i]->product->qty <= 0 )
      <p class="text-danger fw-bold">Stock Have Run Out!!!</p>
      <script>
        $lanjut = false;
      </script>
      @else
      <script>
        $lanjut = true;
      </script>
      @endif
    </div>
  </div>
  <div class="col-2 d-flex">
    <a class="my-auto btn btn-success py-2 shadow-sm cart-button" data-id="{{$wishlists[$i]->product->id}}" data-stock="{{$wishlists[$i]->product->qty}}" data-order="{{$i}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 3 16 16" data-order="{{$i}}">
  <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
</svg><span class=" fw-bold"> Add To Cart</span></a>
  </div>
  <div class="col-2 d-flex ">
    <a class="my-auto btn btn-danger hapus-cart shadow-sm fw-bold"  data-id="{{$wishlists[$i]->id}}" onclick=deleteWishlist(this)><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
</svg> Delete</a>
  </div>

</div>
@endfor

@if(count($wishlists) <= 0)
  <div class="row">
    <div class="col">
        <h1 class="h1 text-center fw-bold">You Didn't have a wishlist</h1>
    </div>
  </div>
@endif
</div>

<script>

  if(!$lanjut){
    document.querySelector('.button-checkout').classList.add('disabled')
  }

$(function (){


    $('.cart-button').on('click',function (e){
    $product_id = $(this).data("id");
    $product_stock = $(this).data("stock");
    let button_order = $(this).data("order") ;
    let  data = `.quantity-field[data-order =  '${button_order}'  ]`;
    $product_qty = document.querySelector(data).value;

    if(($product_qty+$product_stock)  >= $product_stock){

      $.ajax({
      method: "POST",
      url: "/cart/add",
      data: {'product_id' : $product_id,
             'product_qty' : $product_qty,
             'stock' : $product_stock,
              _token: '{{csrf_token()}}' },
      success: function (response,data1){
        Swal.fire(response.status);
      }
    });

    }else{
      Swal.fire("Stock melebihi Batas");
    }
    
  });

  

       

});

function deleteWishlist(el){
   let wishlist_id = el.getAttribute('data-id');
        
        $.ajax({
            method: "post",
            data: {'wishlist_id': wishlist_id,_token: '{{csrf_token()}}'},
            url: '/wishlist/delete',
            success: function(response){
                Swal.fire(response.status);
                location.reload();
                

            },
        });
}

  function incrementValue(e) {
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
  var maxVal = parseInt(parent.find('input[name=' + fieldName + ']').attr('max'), 10);

  if (!isNaN(currentVal) && maxVal > currentVal) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } 
}

function decrementValue(e) {

  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
  
  if (!isNaN(currentVal) && currentVal > 0 ) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(0);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});

// Input min and max function 
function enforceMinMax(el) {
  if (el.value != "") {
    if (parseInt(el.value) < parseInt(el.min)) {
      el.value = el.min;
    }
    if (parseInt(el.value) > parseInt(el.max)) {
      el.value = el.max;
    }
  }
}


</script>
@endsection