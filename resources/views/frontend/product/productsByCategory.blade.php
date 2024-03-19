@extends('layouts.front')

@section('content')

<div class="home-demo">
      <div class="row">
        <div class="large-12 columns">
          <h3 class="mb-3">{{$products[0]->category}} Products</h3>
          <div class="owl-carousel">
           @foreach($products as $product) 
           <a href="/product_detail/{{$product->id}}" class="card-hover" style="text-decoration: none; color:black;">
            <div class="item">
              <div class="card shadow-sm "  style="width: 18rem;">
                <img src="{{$product->img}}" class="card-img-top" alt="{{$product->name}}">
                <div class="card-body">
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

    <script>
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        margin: 0,
        loop: true,
        responsive: {
          10: {
            items: 1
          },
          20: {
            items: 2
          },
          300: {
            items: 3
          }
        }
      })

    </script>

@endsection