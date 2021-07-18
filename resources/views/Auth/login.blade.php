
@extends('Auth.layout')
@section('content')

    {{-- <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div> --}}
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">{{$title_form}}</p>
          <form action="{{ url('/postLogin') }}" method="post">
            @csrf()
            <div class="input-group mb-3">
                <label for="" class="col-3">Email :</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  name="email">
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
            <div class="input-group mb-3">
                <label for="" class="col-3">Password :</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
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
            <div class="row">

              <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          {{-- <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google mr-2"></i> Sign in using Google
            </a>
          </div> --}}
          <!-- /.social-auth-links -->
    
          <p class="mb-1">
            <a href="{{url('forgot_password')}}">I forgot my password</a>
          </p>
          <p class="mb-0">
            <p>Don't Have an Acount ?<a href="{{url('register')}}" class="ml-1">Create an Acount</a></p> 
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>

    {{-- </div>
    <!-- /.login-box -->
    
 --}}


@endsection