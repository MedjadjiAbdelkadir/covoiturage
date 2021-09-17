
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
  <style>
    /* 
    color:#ec1c23;
    color:#08526d */  

  </style>
</head>
<body>
  <div class="register-page">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('Auth/img/register.png')}}" class="w-100 h-100" alt="">
        </div>
        <div class="col-md-6">
          <div class="logo text-center mb-3">
            <a href="{{url('index')}}" >
              <span>Rode</span><span>Me</span>
            </a>
          </div>
          <div class="card">
            <div class="card-header mb-3">
              <h4 class="">Sign up now</h4>
            </div>
            <div class="card-body pb-0 pt-0">
              <form action="{{ url('/postRegister') }}" method="post">
                @csrf()
                <div class="input-group ">  
                    <label for=""class="col-3">Full Name :</label>     
                  <input type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Full Name" name="full_name">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                    @error('full_name')
                    <small class="from-text text-danger">{{ $message }}</small>
                    @enderror
                  </div>
    
                <div class="input-group mt-3">
                    <label for=""class="col-3">Email :</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
    
                </div>
                <div class="text-center">
                    @error('email')
                    <small class="from-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
    
                <div class="input-group mt-3">
                    <label for=""class="col-3">Telphone :</label>
                    <input type="text" class="form-control @error('telphone') is-invalid @enderror" placeholder="Telphone" name="telphone">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                      </div>
                    </div>
                </div> 
                <div class="text-center">
                    @error('telphone')
                      <small class="from-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                        
                <div class="input-group mt-3">
    
                    <label for="" class="col-3">Password :</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"  name="password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                    @error('password')
                      <small class="from-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-group mt-3 "> 
                    <label for="" class="col-3">Birthday :</label>
                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" placeholder="Birthday"  name="birthday">
                </div>
                <div class="text-center">
                    @error('birthday')
                    <small class="from-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="input-group mt-3 ">
                    <label for="" class="col-3">Sexe :</label>
                        <select name="sexe" class="form-control @error('sexe') is-invalid @enderror">
                            <option value="" selected disabled hidden>Select Sexe</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select> 
                </div>
                <div class="text-center">
                    @error('sexe')
                      <small class="from-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-12 mb-3 mt-3">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </div>

                  <!-- /.col -->
                </div>
              </form>  <!--  End Form-->
              <p>You Have Acount ?<a href="{{url('login')}}" class="ml-1">Login Here</a></p>  
            </div>  <!--  End Card Body-->
          </div>  <!--  End Card-->
        </div>
      </div>
    </div>
  </div>
</body>
</html>
