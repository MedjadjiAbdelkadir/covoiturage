
@extends('layouts.nav-bar')
@section('content')
    <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.index',Session::get('users')->id)}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.users')}}">Users</a></li>
                            <li class="breadcrumb-item active">User information</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section> <!-- /.section-breadcrumb -->

        <div class="card">
            <div class="card-header border-bottom mb-2">
                <h3 class="card-title">Personal Information :</h3>
            </div>

            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible col-12 text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('error')}}
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible col-12 text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('success')}}
                </div>
            @endif
        <!-- /.card-header -->
            <div class="card-body p-0 pl-1 pr-3 row pb-4" style="min-height: 100px;">
                <div class="col-sm-12 col-md-3 text-center">
                    <div class="widget-user-image">
                        <img class="img-circle img-bordered-sm " style="width: 180px ; height: 180px"
                             src="{{asset( 'images/users/userProfile/'.$user->avatar )}}"
                             alt="User Avatar">
                    </div>

                </div> <!-- End col-3 -->
                <div class="col-sm-12 col-md-9 row">
                    <div class="input-group col-sm-12 col-md-12 col-lg-8 pt-2 pb-2 ">
                        <div class="input-group-prepend col-4">
                          <span class="mt-1 ml-1">
                              <span class="fas fa-user mr-1"></span>
                              User Name
                          </span>
                        </div>
                        <h1 class="form-control text-center col-8">
                            {{$user->full_name}}
                        </h1>
                    </div> <!-- End col-7 -->
                    <div class="input-group col-sm-12 col-md-12 col-lg-8 pt-2 pb-2 ">
                        <div class="input-group-prepend col-4">
                          <span class="mt-1 ml-1">
                              <span class="fas fa-envelope mr-1"></span>
                              Email
                          </span>
                        </div>
                        <h1 class="form-control text-center col-8 pl-0 pr-0">
                            {{$user->email}}
                        </h1>
                    </div> <!-- End col-7 -->
                    <div class="input-group col-sm-12 col-md-12 col-lg-8 pt-2 pb-2 ">
                        <div class="input-group-prepend col-4">
                          <span class="mt-1 ml-1">
                          <span class="mt-1 ml-1">
                              <span class="fas fa-phone mr-1"></span>
                              Phone
                          </span>
                        </div>
                        <h1 class="form-control text-center col-8">
                            {{$user->telphone}}
                        </h1>
                    </div> <!-- End col-7 -->
                    <div class="input-group col-sm-12 col-md-12 col-lg-8 pt-2 pb-2 ">
                        <div class="input-group-prepend col-4">
                          <span class="mt-1 ml-1">
                          <span class="mt-1 ml-1">
                              <i class="fas fa-birthday-cake mr-1"></i>
                              Date of birth
                          </span>
                        </div>
                        <h1 class="form-control text-center col-8">
                            {{$user->birthday}}
                        </h1>
                    </div> <!-- End col-7 -->
                    <div class="input-group col-sm-12 col-md-12 col-lg-8 pt-2 pb-2 ">
                        <div class="input-group-prepend col-4">
                              <span class="mt-1 ml-1">
                                  <i class="far fas fa-user-shield mr-1"></i>
                                  Role
                              </span>
                        </div>
                        <h1 class="form-control text-center col-8">
                            @if($user->is_admin) Admin @else Mombre @endif
                        </h1>
                    </div> <!-- End col-7 -->
                    <div class="input-group col-sm-12 col-md-12 col-lg-8 pt-2 pb-2 ">
                        <div class="input-group-prepend col-4">

                          <span class="mt-1 ml-1">
                              <i class="fas fa-user-plus mr-1"></i>
                              Date of join
                          </span>
                        </div>
                        <h1 class="form-control text-center col-8">
                            {{$user->created_at->format('d/m/Y')}}
                        </h1>
                    </div> <!-- End col-7 -->
                    <div class="input-group col-sm-12 col-md-12 col-lg-8 pt-2 pb-2 ">
                        <div class="input-group-prepend col-4">
                          <span class="mt-1 ml-1">
                              <i class="fas fa-user-edit mr-1"></i>
                              Last update
                          </span>
                        </div>
                        <h1 class="form-control text-center col-8">
                            {{$user->updated_at->diffForHumans()}}
                        </h1>
                    </div> <!-- End col-7 -->


                </div> <!-- End col-9 -->

            </div> <!-- /.card-body -->




        </div>

    </div>

@endsection







