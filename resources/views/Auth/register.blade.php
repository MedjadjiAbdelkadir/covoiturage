
@extends('Auth.layout')
@section('content')
 
    {{-- <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Rode</b><span>Me</span></a>
      </div> --}}
    
      <div class="card">
        <div class="card-body register-card-body">
        <p class="login-box-msg">{{$title_form}}</p>
    
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
          </form>
    
          {{-- <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i>
              Sign up using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google mr-2"></i>
              Sign up using Google
            </a>
          </div>
     --}}
          <p>You Have Acount ?<a href="{{url('login')}}" class="ml-1">Login Here</a></p>        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->

    {{-- </div>
    <!-- /.register-box -->
     --}}
@endsection