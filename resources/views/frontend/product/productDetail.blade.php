@extends('layouts.front')


@section('content')
<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
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





fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 3.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 

/* Testimonial css */


#testimonials{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width:100%;
}
.testimonial-heading{
    letter-spacing: 1px;
    margin: 30px 0px;
    padding: 10px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
 
.testimonial-heading span{
    font-size: 1.3rem;
    color: #252525;
    margin-bottom: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.testimonial-box-container{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    width:100%;
}
.testimonial-box{
    width:500px;
    box-shadow: 2px 2px 30px rgba(0,0,0,0.1);
    background-color: #ffffff;
    padding: 20px;
    margin: 15px;
    cursor: pointer;
}
.profile-img{
    width:50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}
.profile-img img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.profile{
    display: flex;
    align-items: center;
}
.name-user{
    display: flex;
    flex-direction: column;
}
.name-user strong{
    color: #3d3d3d;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}
.name-user span{
    color: #979797;
    font-size: 0.8rem;
}
.reviews{
    color: #f9d71c;
}
.box-top{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.client-comment p{
    font-size: 0.9rem;
    color: #4b4b4b;
}
.testimonial-box:hover{
    transform: translateY(-10px);
    transition: all ease 0.3s;
}
 
@media(max-width:1060px){
    .testimonial-box{
        width:45%;
        padding: 10px;
    }
}
@media(max-width:790px){
    .testimonial-box{
        width:100%;
    }
    .testimonial-heading h1{
        font-size: 1.4rem;
    }
}
@media(max-width:340px){
    .box-top{
        flex-wrap: wrap;
        margin-bottom: 10px;
    }
    .reviews{
        margin-top: 10px;
    }
}
::selection{
    color: #ffffff;
    background-color: #252525;
}
</style>
<div class="container py-5 border rounded-4 shadow-sm">
 <div class="row">
  <div class="col-8 col-sm-6 col-md-5 col-lg-3 ">
   <img class="object-fit-contain w-100 " src="{{$product[0]->img}}" alt="">
  </div>
  <div class="col">
    <div class="title d-flex justify-content-between">
      <h2 class="d-inline">{{$product[0]->name}}</h2>
      @if($product[0]->trending == 'yes')
      <h4 class="my-auto"><span class="bg-danger badge">Trending</span></h4>
      @endif 
    </div>
    <div>
    @if(count($reviews) > 0)
    @for($i = 0 ; $i< $total_star ; $i++)
      <i class="star-fill">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFCC34" class="bi bi-star-fill" viewBox="0 0 16 16">
          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
        </svg>
      </i>
    @endfor
    @for($j=5-$total_star; $j>0; $j--)
      <i class="star-nofill">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFCC34" class="bi bi-star" viewBox="0 0 16 16">
          <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
        </svg>
      </i>
    @endfor
  
    <span>({{count($reviews)}})</span> 
     @endif
    </div>
    <div class="content">
      <hr>
      <div class="price">
        <span class="me-3">Original Price : <s class="autoNumeric">{{$product[0]->original_price}}</s></span>
        <span class="fw-bold">Selling Price : <span class="autoNumeric">{{$product[0]->selling_price}}</span></span>
      </div>
      <div class="description ">{{$product[0]->description}} </div>
      <hr>
    </div>
    <div>
      @if($product[0]->qty > 0)
      <h5><span class="badge bg-success">In Stock</span> Stock : {{$product[0]->qty}}</h5>
      <script>
        $lanjut = true;
      </script>
      @else
      <h5><span class="badge bg-danger">Sold Out</span></h5>
      <script>
        $lanjut = false;
      </script>
      @endif
    </div class="">
     <div class="input-group d-inline ">
      <input type="hidden" value="{{$product[0]->qty}}" class="stock">
      <input type="hidden" value="{{$product[0]->id}}" class="product_id">
      <input type="button" value="-" class="button-minus" data-field="quantity">
      <input onkeyup=enforceMinMax(this)  type="tel" step="1" min="1" max="{{$product[0]->qty}}" value="1" name="quantity" class="quantity-field fs-6 fw-bold" >
      <input type="button" value="+" class="button-plus" data-field="quantity">
     </div>
     <button class="whislist-button btn bg-success p-2 text-white fw-bold ms-4" >Add to Whislist<svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
</svg></button>
     <button class="cart-button btn bg-primary p-2 text-white fw-bold ms-1" >Add to Cart <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
</svg></button>
  </div>
 </div>
</div>

@if(count($orderItems) > 0 && count($alreadyReview) <= 0 )
    <input type="hidden" class="product_id" value="{{$product[0]->id}}">
  <h1 class="h1 text-center mt-5 ">Rate My Product</h1>
   <div class="row">
    <div class="col d-flex ">
    <fieldset class="rating mx-auto">
        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    </fieldset>
    </div>
   </div>
   <div class="row">
    <div class="col">
        <textarea name="review_description" class="form-control review_description" id="" cols="30" rows="10"></textarea>
    </div>
   </div>
   <button class="btn btn-success fw-bold text-light mt-3 w-100 btn-review">Submit Review</button>
   @endif

@if(count($alreadyReview) >= 1 )
      <section id="testimonials">
        <!--heading--->
        <div class="testimonial-heading">
            <h4 class="fw-bold h4 ">Reviews</h4>
        </div>
        <!--testimonials-box-container------>
        <div class="testimonial-box-container">
          @foreach($reviews as $review)
            <!--BOX-1-------------->
            <div class="testimonial-box">
                <!--top------------------------->
                <div class="box-top">
                    <!--profile----->
                    <div class="profile">
                        <!--img---->
                        <div class="profile-img">
                            <img src="https://cdn3.iconfinder.com/data/icons/avatars-15/64/_Ninja-2-512.png" />
                        </div>
                        <!--name-and-username-->
                        <div class="name-user">
                            <strong>{{$review->user->name}}</strong>
                            <span>{{$review->user->email}}</span>
                        </div>
                    </div>
                    <!--reviews------>
                    <div class="reviews">
                      @for($i = 0 ; $i< $review->star ; $i++)
                        <i class="star-fill">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                          </svg>
                        </i>
                      @endfor
                      @for($j=5-$review->star; $j>0; $j)
                        <i class="star-nofill">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFCC34" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                          </svg>
                        </i>
                      @endfor

                    </div>
                </div>
                <!--Comments---------------------------------------->
                <div class="client-comment">
                    <p>{{$review->review_description}}</p>
                </div>
            </div>
            
        </div>
      </section>
      @endforeach

@endif

<script>
  
  if(!$lanjut){
   document.querySelector('.cart-button').classList.add('disabled');
   document.querySelector('.whislist-button').classList.add('disabled');
  }
  // Ajax Cart
$(function (){
  $('.btn-review').on('click',function (){
    let star = document.querySelector('input[name="rating"]:checked').value;
    let review_description = document.querySelector('textarea.review_description').value;
    let product_id = document.querySelector('.product_id').value;

    $.ajax({
      method: "POST",
      url: "/review",
      data: { 
              product_id,
              star,
              review_description,
              _token: '{{csrf_token()}}' },
      success: function (){
        location.reload();
      }
    });
  });

  $('.cart-button').on('click',function (){
    $product_id = document.querySelector('.product_id').value;
    $product_qty = document.querySelector('.quantity-field').value;
    $stock = document.querySelector('.stock').value;
    console.log($stock)

    if({{$product[0]->qty }} >= $stock){

      $.ajax({
      method: "POST",
      url: "/cart/add",
      data: {'product_id' : $product_id,
             'product_qty' : $product_qty,
             'stock' : $stock,
              _token: '{{csrf_token()}}' },
      success: function (response,data1){
        Swal.fire(response.status);
      }
    });

    }else{
      Swal.fire("Stock melebihi Batas");
    }
    
  });

  $('.whislist-button').on('click',function (){

    $product_id = document.querySelector('.product_id').value;

      $.ajax({
      method: "POST",
      url: "/wishlist/add",
      data: {'product_id' : $product_id,
              _token: '{{csrf_token()}}' },
      success: function (response,data1){
        Swal.fire(response.status);
      }
    });
      
    
  });

})

  function incrementValue(e) {
 
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val());
  var maxVal = parseInt(parent.find('input[name=' + fieldName + ']').attr('max'));
    console.log(currentVal);
  if (!isNaN(currentVal) && (maxVal > currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } 
}

function decrementValue(e) {
 
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 0) {
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