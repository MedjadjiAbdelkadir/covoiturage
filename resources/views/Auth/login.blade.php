
{{-- ----------------------------------------------------------------------------------------- --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="{{ asset('font-awesome/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('Auth/css/style.css')}}">
  <style>
    /*
    color:#ec1c23;
    color:#08526d */

  </style>
</head>
<body>
  <div class="login-page">

    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('Auth/img/login-5.jpg')}}"alt="" class="w-100 h-100">

        </div>
        <div class="col-md-6">
          <div class="logo text-center mb-3">
            <a href="{{url('index')}}" >
              <span>Rode</span><span>Me</span>
            </a>
          </div>
          <div class="card">
            <div class="card-header mb-3">
              <h4 class="">Login to our site</h4>
            </div>
            <div class="card-body">
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible col-12 text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{Session::get('error')}}
                    </div>
                @endif
              <form action="{{ url('/postLogin') }}" method="post">
                @csrf()
                <div class="input-group mb-1">
                    <label for="" class="col-3">Email :</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  name="email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="text-center mt-0">
                  @error('email')
                    <small class="from-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="input-group mt-3 mb-1">
                    <label for="" class="col-3">Password :</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="text-center mt-0">
                  @error('password')
                    <small class="from-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <p class="mb-3 text-right">
                  <a href="{{url('forgot_password')}}">I forgot my password</a>
                </p>
                <div class="row">

                  <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>

              <p class="mb-0">
                <p>Don't Have an Acount ?<a href="{{url('register')}}" class="ml-1">Create an Acount</a></p>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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




