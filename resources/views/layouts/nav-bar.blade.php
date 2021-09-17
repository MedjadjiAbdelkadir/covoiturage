<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="{{asset('font-awesome/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('Auth/css/style.css')}}">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('home/style.css')}}">
</head>
<body style="background-color:#F3F5F8  ;font-family: poppins" id="body">
  <!-------------- Start Header -------------->
  <section class="header-page fixed-top">

  <!-------------- Start UpperBar -------------->

  <div class="upper-bar">
    <div class="container">
      <div class="row">
        <div class="info col-sm text-center text-sm-left">
            <i class="fa fa-envelope mr-1"></i><span>covoiturage@gmail.com</span>,
            <i class="fa fa-phone mr-1"></i><span>0775805470</span>
        </div>
        <div class="info col-sm text-center text-sm-right">
            <i class="fab fa-twitter mr-1"></i><span>covoiturage</span>,
           <i class="fab fa-telegram-plane mr-1"></i><span>covoiturage_Algeria</span>
        </div>
      </div>
    </div>
  </div>
  <!-------------- End UpperBar -------------->
  <!-------------- Start Navbar -------------->
  {{-- fixed-top --}}
    <nav class="navbar  navbar-expand-lg  navbar-light navbar-fixed-top">
      {{-- Start Container --}}
      <div class="container">
          <a class="navbar-brand h1" href="{{url('index')}}">
            <span>Rode</span><span>Me</span>
          </a>
          <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon text-red"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(Session::has('users'))
              <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('images/users/userProfile/'.Session::get('users')->avatar)}}" class="img-circle" style="height: 45px;width:45px">
                    </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href=""class="dropdown-item">{{Session::get('users')->full_name}}</a>
                    <div class="dropdown-divider"></div>
                      <a href="{{url('posts')}}" class="dropdown-item text-left">Show Annonce</a>
                    <a href="{{url('post/create/')}}" class="dropdown-item text-left">Add Annonce</a>
                    <a href="{{url('profile/my-post')}}" class="dropdown-item text-left">Mes Annonce</a>
                    <a href="{{url('profile/my-reservation')}}" class="dropdown-item text-left">Mes Reservation</a>


                    <a href="{{url('user/'.Session::get('users')->id)}}" class="dropdown-item text-left">Account</a>
                     @if(Session::get('users')->is_admin)
                        <a href="{{url('admin/index/'.Session::get('users')->id)}}" class="dropdown-item text-left">Dashboard</a>
                     @endif
                    <div class="dropdown-divider text-left"></div>
                    <a href="{{url('logout')}}" class="dropdown-item text-left"> Sign out</a>
                  </div>
                </li>
              </ul>

            @else
                <ul class="navbar-nav m-lg-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#body">Home<span class="sr-only">(current)</span></a>
                  </li>

{{--                  <li class="nav-item">--}}
{{--                    <a class="nav-link" href="">About Us</a>--}}
{{--                  </li>--}}
                  <li class="nav-item ">
                    <a class="nav-link" href="#features">features</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#Its-Works">How It Wotks</a>
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link" href="#contact">Contact</a>
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link" href="#faqs-page">FAQ'S</a>
                  </li>


                </ul>
                <ul class="navbar-nav ml-auto last-list">
                  {{-- Start Btn Login And Register  --}}
                  <li class="nav-item btn btn-default mr-2">
                    <a href="{{url('login')}}" class=" ml-0 pl-0 mr-0 pr-0">Connexion</a>
                  </li>
                  <li class="nav-item btn reg">
                    <a href="{{url('register')}}" class=" ml-0 pl-0 mr-0 pr-0">Inscription</a>
                  </li>
                  {{-- End Btn Login And Register  --}}
                </ul>
            @endif
          </div> <!--End navbar-collapse -->
      </div> <!--End Container -->
    </nav>
  <!-------------- End Nav Bar -------------->

</section>
<!-------------- End Header -------------->


    @yield('content')


{{-- Start Page Footer --}}
<section class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <a class="h3 title" href="{{url('index')}}">
          <span>Rode</span><span>Me</span>
        </a>
        <p class="mt-3">Website for interstate and municipal transportation in Algeria</p>
      </div>
      <div class="col-lg-4 col-md-3 col-sm-4">
        <p class="">Links</p>
        <ul class="list-unstyled">
          <li>
            <a href="">Home</a>
          </li>
            <li>
                <a href="#features">Features</a>
            </li>
          <li>
            <a href="#Its-Works"> How It Works</a>
          </li>
            <li>
                <a href="#contact">Contact</a>
            </li>
          <li>
            <a href="#faqs-page">FAQ'S</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-4 col-md-5 col-sm-8">
        <p class="">Contact Us</p>
        <ul class="list-unstyled">
          <li>
            <a href="covoiturage@gmail.com">
              <i class="fa fa-envelope mr-1"></i>
               covoiturage@gmail.com
            </a>
          </li>
          <li>
            <a href="https://twitter.com/covoiturage">
              <i class="fab fa-twitter mr-1"></i>
                https://twitter.com/covoiturage
            </a>
          </li>
          <li>
            <a href="https://facebook.com/covoiturage"><i class="fab fa-facebook mr-1"></i>
               https://facebook.com/covoiturage
            </a>
          </li>
          <li>
            <a href="covoiturage_Algeria"><i class="fab fa-telegram-plane mr-1"></i>
              covoiturage_Algeria
            </a>
          </li>
          <li>
            <a href="" class=""><i class="fa fa-phone mr-1"></i>
              0775805470
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-footer text-center">
    <h6>Copyright © 2021-2022 <a href="">RodeMe</a> . All rights reserved.</h6>
  </div>
</section>
{{-- End Page Footer --}}


{{--<script type="text/javascript">--}}
{{--  $(function() {--}}
{{--    const Toast = Swal.mixin({--}}
{{--      toast: true,--}}
{{--      position: 'top-end',--}}
{{--      showConfirmButton: false,--}}
{{--      timer: 3000--}}
{{--    });--}}
{{--  });--}}


{{--</script>--}}

{{--</script>--}}

{{--<script >--}}
{{--      var input_date = document.querySelector('input[type="date"]'),--}}
{{--      today = new Date() ,--}}
{{--      myMonth = today.getMonth() +1,--}}

{{--      mydate = today.getDate(),--}}
{{--      myYear = today.getFullYear();--}}

{{--    window.onload = function(){--}}
{{--      if(myMonth <10){--}}
{{--        myMonth = "0"+ myMonth ;--}}
{{--      }--}}
{{--      if(mydate < 10){--}}
{{--        mydate = "0" +mydate ;--}}
{{--      }--}}
{{--      var myMin    =document.createAttribute('min') ;--}}
{{--      myMin.value =  myYear+"-"+myMonth + "-" + mydate ;--}}
{{--      input_date.setAttributeNode(myMin) ;--}}

{{--        var myMax    =document.createAttribute('max') ;--}}
{{--        myMonthMax =parseInt( myMonth) +1 ;--}}
{{--        if(myMonthMax <10){--}}
{{--          myMonthMax = "0"+ myMonthMax ;--}}
{{--      }--}}
{{--        myMax.value =  myYear+"-"+myMonthMax +"-" + mydate ;--}}

{{--      input_date.setAttributeNode(myMax) ;--}}

{{--    }--}}

{{--</script>--}}
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
  <script src="{{asset('Profile/js/main.js')}}"></script>

</body>
</html>
