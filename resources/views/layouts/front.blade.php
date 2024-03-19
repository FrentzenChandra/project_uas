<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acen Project</title>
     {{-- Bootstrap css --}}
     <link rel="stylesheet" href="{{asset('frontEnd/css/bootstrap5.css')}}">
     {{-- Custom Css --}}
     <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
      <!-- Owl Stylesheets -->
     <link rel="stylesheet" href="{{asset('frontEnd/owl_carousel/owlcarousel/assets/owl.carousel.min.css')}}">
     <link rel="stylesheet" href="{{asset('frontEnd/owl_carousel/owlcarousel/assets/owl.theme.default.min.css')}}">
     <!-- javascript owl -->
    <script src="{{asset('frontEnd/owl_carousel/vendors/jquery.min.js')}}"></script>
    <script src="{{asset('frontEnd/owl_carousel/owlcarousel/owl.carousel.js')}}"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
  <div class="position-fixed " style="bottom: 5%; left: 3%;">
    <a href="https://wa.link/7xqalt" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#00B66C" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
</svg></a>
  </div>

<nav class="navbar navbar-expand-lg navbar-light bg-body shadow-sm" >
  <div class="container-fluid mx-5">
    <a class="navbar-brand" href="#">Project Uas Acen</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex" role="search" action="/search" method="post"  >
      {{ csrf_field() }}
      <input class="form-control me-2" type="search" name="slug" id="tags" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="collapse navbar-collapse d-flex flex-row-reverse " id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{url('/cart')}}">
            Cart
            <span class="bg-primary text-white fw-bold py-1 px-3 text-center rounded fs-6 cart-status">0</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/order')}}">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/wishlist')}}">
            Wishlist
            <span class="bg-success text-white fw-bold py-1 px-3 text-center rounded fs-6 wishlist-status">0</span>
          </a>
        </li>
        <li class="nav-item">
          <a type="button" class=" nav-link  position-relative" href="{{url('/checkout')}}">
            Checkout
            
          </a>
        </li>
        <li class="nav-item">
          @guest
                        @if (Route::has('login') )
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        </ul>
                        </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </li>
      </ul>
    </div>
  </div>
</nav>

  @yield('slider')
 <div class="container py-4">
  @yield('content')
 </div> 
 {{-- Sweet alert --}}
  @include('sweetalert::alert')

  
 {{-- Sweet --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- Jquery --}}
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  {{-- Bootstrap js --}}
  <script src="{{asset('frontEnd/js/bootstrap5.js')}}"></script>
  <script src="{{asset('admin/js/core/popper.min.js')}}"></script>
  {{-- Auto numeric --}}
  <script src={{asset('sources/js/autoNumeric.js')}}></script>
 
  <!-- vendors -->
  <script src="{{asset('frontEnd/owl_carousel/vendors/highlight.js')}}"></script>
  <script src="{{asset('frontEnd/owl_carousel/js/app.js')}}"></script> 
{{-- Custom Js --}}
  <script src="{{asset('custom/js/custom.js')}}"></script>
  {{-- Jquer ui --}}
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65a783258d261e1b5f54421c/1hkb5gjap';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  <script>
  $( function() {
    $('#tags').on('click',function(){
      $.ajax({
      method: "POST",
      url: "/slug",
      data: { _token: '{{csrf_token()}}' },
      success: function (response){
        $( "#tags" ).autocomplete({
          source: response.slug
        });
      }
    });
    });
    
    
  } );
  </script>
</body>
</html>