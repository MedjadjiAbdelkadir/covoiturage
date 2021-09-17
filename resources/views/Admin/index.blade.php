@extends('layouts.nav-bar')
@section('content')
<div class="container">

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section> <!-- /.section-breadcrumb -->

    <section class="content" style="height: 510px;">
        <div class="container-fluid">
          <!-- =========================================================== -->
  {{--
    <i class="fas fa-bullhorn"></i>   annonce

    {{-- <i class="fas fa-history"></i>  historique --}}


          <!-- Small Box (Stat card) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$nbrReservation}}</h3>

                  <p>Reservations</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{route('admin.reservations')}}" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$nbrPosts}}</h3>

                  <p>Les Publicités </p>
                </div>
                <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <a href="{{route('admin.posts')}}" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$nbrUsers}}</h3>

                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="{{route('admin.users')}}" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$nbrMessages}}</h3>

                  <p>Messages</p>
                </div>
                <div class="icon">
                  <i class="far fa-envelope"></i>
                </div>
                <a href="{{route('admin.getAllContact')}}" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3>3</h3>

                    <p>Settings</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-tools"></i>
                  </div>
                  <a href="{{route('admin.Settings')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
              <!-- ./col -->
          </div>
          <!-- /.row -->

          <!-- Small Box (Stat card) -->

  {{-- primary  --}}
          <!-- =========================================================== -->





        </div><!-- /.container-fluid -->
      </section>
</div>
@endsection
