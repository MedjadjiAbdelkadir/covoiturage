
{{-- --------------------------------------------------------- --}}
{{-- 
@extends('Auth.layout')
@section('content')

@endsection --}}

{{-- --------------------------------------------------------------------------------------- --}}

{{-- ----------------------------------------------------------------------------------------- --}}
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
</head>
<body>
  <div class="login-page">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <img src="{{asset('Auth/img/forget-password-1.jpg')}}" alt=""class="w-100 h-100">
        </div>
        <div class="col-md-6">
          <div class="logo text-center mb-3">
            <a href="{{url('index')}}" >
              <span>Rode</span><span>Me</span>
            </a>
          </div>
          <div class="card">
            <div class="card-header mb-1">
              <h4 class="">Forgot Password</h4>
            </div>
            <div class="card-body">
              <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
  
              <form action="recover-password.html" method="post">
                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email"  name="email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
        
              <p class="mt-3 mb-1">
                <a href="{{url('login')}}">Login</a>
              </p>
              <p class="mb-0">
                  <p>Don't Have an Acount ?<a href="{{url('register')}}" class="ml-1">Create an Acount</a></p> 
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
