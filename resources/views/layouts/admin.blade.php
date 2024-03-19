 
 
 <!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>
    Acen Project
  </title>
  <!--Fonts and icons-->
  <link href="{{asset('admin/fonts/font.css')}}" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href={{asset('admin/css/nucleo-icons.css')}} rel="stylesheet" />
  <link href={{asset('admin/css/nucleo-svg.css')}} rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="{{asset('admin/js/font_awsome.js')}}" crossorigin="anonymous"></script>
  <link href={{asset('admin/css/nucleo-svg.css')}} rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href={{asset('admin/css/argon-dashboard.css?v=2.0.4')}} rel="stylesheet" />
  {{-- Custom Css --}}
  <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
  {{-- Bootstrap css --}}
</head>

<body class="g-sidenav-show dark-version bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-default navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{url('/dashboard')}}" target="_blank">
        <span class="ms-auto font-weight-bold">Admin Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class=" w-auto" id="sidenav-collapse-main">
      @include('layouts.sidebar')
    </div>
    
  </aside>
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ Route::current()->getName();}}</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">{{Request::segment(1)}} / {{Request::segment(2)}}</h6>
        </nav>
        <div class="collapse navbar-collapse d-flex" id="navbar"> 
          <div class="ms-md-auto pe-md-3 d-flex align-items-center me-auto">
            
          </div>
          
          <li class="nav-item dropdown " style="list-style: none">
            
           <a id="navbarDropdown " class="nav-link dropdown-toggle text-light  fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
           </a>
           <div class="dropdown-menu dropdown-menu-end "  aria-labelledby="navbarDropdown">
              <a class="dropdown-item text-light" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
              </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
             </form>
           </div>
           <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
          </li>
         </li>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    {{-- Disini tempat naruh kondisi html nya --}}
    <div class="container-fluid py-4 overflow-auto">
    @yield('content')
    </div>
    
</main>
    



{{-- Ajax --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <!--   Core JS Files   -->
  <script src="{{asset('admin/js/core/popper.min.js')}}"></script>
  {{-- {{asset("frontEnd/js/bootstrap5.js")}} --}}
  <script src={{asset('admin/js/core/bootstrap.min.js')}}></script>
  <script src={{asset('admin/js/plugins/perfect-scrollbar.min.js')}}></script>
  <script src={{asset('admin/js/plugins/smooth-scrollbar.min.js')}}></script>
  <script src={{asset('admin/js/plugins/chartjs.min.js')}}></script>
  {{-- Auto numeric --}}
  <script src={{asset('sources/js/autoNumeric.js')}}></script>
  <!--   Sweet alert   -->
  @include('sweetalert::alert')

  <script>



    
    
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src={{asset('admin/js/button.js')}}></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src={{asset('admin/js/argon-dashboard.min.js?v=2.0.4')}}></script>
  <script src="{{asset('custom/js/custom.js')}}"></script>
</body>

</html>