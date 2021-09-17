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
                            <li class="breadcrumb-item"><a href="{{route('admin.getAllContact')}}">All Message</a></li>
                            <li class="breadcrumb-item active">Show Message</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section> <!-- /.section-breadcrumb -->

        <!-- /.card -->
        <div class="card p-0">
            <div class="card-header">
                <h3 class="card-title">Message</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body col-12 row p-0 pl-2 pr-0" style="min-height: 100px;">
                <div class="input-group col-sm-12 col-md-12 col-lg-12 pt-2 pb-2 ">
                    <div class="input-group-prepend col-3">
                          <span class="mt-1 ml-1">
                              <span class="fas fa-user mr-1"></span>
                              Sender's Name :
                          </span>
                    </div>
                    <h1 class="form-control text-center col-8">
                            {{$contact->full_name}}
                        </h1>
                </div> <!-- End col-7 -->
                    <div class="input-group col-sm-12 col-md-12 col-lg-12 pt-2 pb-2 ">
                        <div class="input-group-prepend col-3">
                          <span class="mt-1 ml-1">
                              <span class="fas fa-envelope mr-1"></span>
                              Message :
                          </span>
                        </div>
                        <h1 class="form-control text-left ml-0 pl-2 col-6" style="min-height: 100px">
                            {{$contact->message}}
                        </h1>
                    </div> <!-- End col-7 -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>

@endsection
