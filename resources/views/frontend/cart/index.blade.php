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

@for($i = 0 ; $i<count($products) ; $i++)
 <div class="row">
  <div class="col-2">
    <img class="object-fit-contain w-100" src="{{$products[$i]->product->img}}" alt="">
  </div>
  <div class="col-3 d-flex ">
    <h3 class="my-auto">{{$products[$i]->product->name}}</h3>
  </div>
  <div class="col-2 d-flex ">
    <input type="hidden" class="selling_price" value="{{$products[$i]->product->selling_price}}">
    <h4 class="my-auto"><span class="autoNumeric">{{$products[$i]->product->selling_price}}</span></h4>
  </div>
  <div class="col-3 d-flex ">
    <div class="input-group my-auto">
      <input type="button" value="-" class="button-minus rounded" data-field="quantity">
      <input onkeyup=enforceMinMax(this)  type="number" step="1" max="{{$products[$i]->product->qty}}" value="{{$products[$i]->qty}}" name="quantity" class="quantity-field fs-6 fw-bold" data-id="{{$products[$i]->id}}">
      <input type="button" value="+" class="button-plus rounded" data-field="quantity" data-id="{{$products[$i]->id}}">
      @if($products[$i]->product->qty <= 0 )
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
  <div class="col-1 d-flex">
    <a class="my-auto btn btn-danger hapus-cart" data-id="{{$products[$i]->id}}" onclick=deleteCart(this)>Hapus</a>

  </div>
 </div>
 <hr>
@endfor
<div class="row">
  <div class="col d-flex justify-content-between">
    <h5>Total Price : <span class="total-price autoNumericPrice"></span></h5>
    <a class="btn btn-success button-checkout" href="/checkout">Procced To Checkout</a>
  </div>
 </div>
</div>


<script>

  if(!$lanjut){
    document.querySelector('.button-checkout').classList.add('disabled')
  }

$(function (){
    $('.button-checkout').click(function (){
      let allQty = document.querySelectorAll('.quantity-field');
      for(let i = 0 ; i< allQty.length ; i++){

        $.ajax({
          method: "Post",
          url: "/cart/update",
          data:{'productQty' : allQty[i].value,
                'cartId' : allQty[i].getAttribute('data-id'),
                _token: '{{csrf_token()}}'},
          success: function(response){
            console.log("Nilai Ke - " + i  + " Success");
          }
        })
      }
    })

  // Ini perhitungan total harga
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

function deleteCart(el){
   let cart_id = el.getAttribute('data-id');
   console.log(cart_id);
        
        $.ajax({
            method: "post",
            data: {'cart_id': cart_id,_token: '{{csrf_token()}}'},
            url: '/cart/delete',
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