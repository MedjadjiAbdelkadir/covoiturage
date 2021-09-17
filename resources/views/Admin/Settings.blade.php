
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
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section> <!-- /.section-breadcrumb -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Settings</h3>
            </div><!-- End card-header -->

            <div class="card-body col-12 table-responsive p-0" style="min-height: 100px;">

            </div><!-- End card-body -->
        </div><!-- End card -->


    </div>

@endsection
