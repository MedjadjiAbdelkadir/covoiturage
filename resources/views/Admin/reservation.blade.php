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
              <li class="breadcrumb-item"><a href="{{route('admin.reservations')}}">Reservations</a></li>
              <li class="breadcrumb-item active">Reservation</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section> <!-- /.section-breadcrumb -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Reservation</h3>

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
        <div class="card-body col-12 table-responsive p-0" style="height: 450px;">
          <table class="table table-head-fixed text-nowrap table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Passengers </th>
                <th>Drivers</th>
                <th>Date of Reservation</th>
                <th class="text-center">Number Of seats</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
              <tbody>
                <tr>
                    <td>{{$reservation->id}}</td>
                    <td>{{$reservation->passengers->full_name}}</td>
                    <td>{{$reservation->drivers->full_name}}</td>
                    <td>{{$reservation->created_at->format('d/m/Y')}}</td>
                    <td class="text-center">{{$reservation->nbr_place_res}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.show.reservation',$reservation->id)}}"class="btn">
                            <i class="fas fa-eye mr-1"></i>
                        </a>
                        <a data-toggle="modal" data-target="#admindeletereservation{{$reservation->id}}" class="btn">
                            <i class="fas fa-trash text-danger"></i>
                        </a>
                    <!-- modal -->
                        <div class="modal fade" style="margin-top: 200px" id="admindeletereservation{{$reservation->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><i class="fas fa-trash text-danger mr-1"></i>Delete Reservation</h4>
                                    <button type="button" class="close border-danger" data-dismiss="modal" aria-label="Close">×</button>
                                </div>
                                <div class="modal-body">

                                <p>Are you sure you want to delete this reservation for <br> Mr:
                                  <span class="text-primary">{{$reservation->passengers->full_name}}</span>
                                </p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="{{route('admin.destroy.reservation',$reservation->id)}}" class="btn btn-danger">Yes</a>

                                </div>
                            </div>
                        </div>
                        <!--/ modal -->


                    </td>
                </tr>

                </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
</div>

@endsection
