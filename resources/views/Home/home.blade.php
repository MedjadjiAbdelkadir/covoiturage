<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="{{asset('font-awesome/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="{{asset('home/style.css')}}">

</head>
<body>
      {{-- Start Hedaer --}}
      <div class="header">
        {{-- Start Navbar--}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light mr-2">
            {{-- Start Container --}}
            <div class="container">
                <a class="navbar-brand h1" href="#">Rode<span>Me</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    {{-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                    </li>  --}}
                    <li class="nav-item"> 
                        <a class="nav-link" href="">How It Woks</a>                          
                    </li>
                    <li class="nav-item"> 
                        <a class="nav-link" href="">About Us</a>                          
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="">features</a> 
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="">Contact</a> 
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="">FAQ'S</a> 
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="">Help</a> 
                    </li>
                </ul>
                <form class="form my-2 my-lg-0">
                    <a class="btn default" href="{{url('login')}}"><i class="fa fa-user" aria-hidden="true"></i> Sign in</a>
                    <a class="btn border-primary info" href="{{url('register')}}">Sign up</a>
                  </form>
                </div>    
            </div>
            {{-- End Container --}}
        </nav> 
        {{-- End Navbar --}}
        {{-- Start Container --}}
         <div class="container">
             <div class="row">
                 <div class="col-sm-6">
                    <h4>
                        Car sharing management, you can find accompanying car suggestions that fit your habits,
                         simple and easy to use, saving time and money 
                    </h4>
                <a href="{{url('register')}}"class="btn btn-primary text-uppercase">Get Started</a>
                 </div>

             </div>
        </div>   
        {{-- End Container --}}


    </div>
    {{-- End Header --}}
</body>
</html>