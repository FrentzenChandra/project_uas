@extends('layouts.front')

@section('slider')
 @include('layouts.front_slider') 
@endsection

@section('content')


<div class="home-demo ">
      <div class="row">
        <div class="large-12 columns">
          <h3 class="mb-3">Featured Product</h3>
          <div class="owl-carousel">
           @foreach($feature_product as $product) 
           <a href="product_detail/{{$product->id}}" class="card-hover" style="text-decoration: none; color:black;">
            <div class="item">
              <div class="card shadow-sm "  style="width: 18rem; ">
                <img src="{{$product->img}}" class="card-img-top" alt="{{$product->name}}">
                <div class="card-body " style="">
                  <h5 class="card-title ">{{$product->name}}</h5>
                  <p class="card-text autoNumeric">{{$product->selling_price}}</p>
                </div>
              </div>    
            </div>
           </a>
            @endforeach 
          </div>
        </div>
      </div>
</div>

<div class="home-demo mt-5 pt-5">
      <div class="row">
        <div class="large-12 columns">
          <h3 class="mb-3">Trending Category</h3>
          <div class="owl-carousel">
           @foreach($trending_category as $category) 
           <a href="category/{{$category->name}}" class="card-hover" style="text-decoration: none; color:black;">
            <div class="item">
              <div class="card shadow-sm "  style="width: 18rem;">
                <img src="{{$category->img}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title fw-bold">{{$category->name}}</h5>
                  <p class="card-text ">{{$category->description}}</p>
                </div>
              </div>    
            </div>
            </a>
            @endforeach 
          </div>
        </div>
      </div>
</div>
    <script>
      var owl = $('.owl-carousel');
      var owl2 = $('.owl-carousel2');
      owl.owlCarousel({
        margin: 0,
        loop: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1200: {
            items: 3
          }
        }
      })
      owl2.owlCarousel({
        margin: 0,
        loop: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      })
    </script>

@endsection