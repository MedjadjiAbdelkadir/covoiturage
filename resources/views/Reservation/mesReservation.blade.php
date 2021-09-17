@extends('layouts.nav-bar')
@section('content')
<div class="container">

    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              {{-- <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li> --}}
                <li class="breadcrumb-item active">Mes Reservation</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section> <!-- /.section-breadcrumb -->

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Mes Reservation</h3>
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
        <div class="card-body col-12 table-responsive p-0" style="min-height: 100px;">
        @if(isset($reservation) && $reservation ->count() > 0)

            <table class="table table-head-fixed text-nowrap table-striped">
                <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Driver's Name</th>
                    <th>Départ vers</th>
                    <th>Arrive to</th>
                    <th>Date and Time</th>
                    <th>Place Reservé</th>
                    <th>Prix</th>
                    <th style="width:130px ">Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i =1
                    @endphp
                    @foreach($reservation as $myReservations)
                    <tr class="text-center">
                        <td>{{$i++}}</td>
                        <td>{{$myReservations->full_name}}</td>

                        <td>{{$myReservations->state_départ}},{{$myReservations->municipal_départ}}</td>
                        <td>{{$myReservations->state_arrivé}},{{$myReservations->municipal_arrive}}</td>
                        <td class="pl-1 pr-1">{{$myReservations->date_départ}}/{{$myReservations->time_départ}}</td>
                        {{-- <td>{{$reservation->time_départ}}</td> --}}
                        <td>{{$myReservations->nbr_place_res}}</td>
                        <td class="pl-1 pr-1">{{$myReservations->prix}}da</td>
                        <td class="text-center  pt-1">
                            <a href="{{route('showReservation',$myReservations->id)}}"class="btn">
                                <i class="fas fa-eye mr-1"></i>
                            </a>

                            <a width="10px" data-toggle="modal" data-target="#cancel{{$myReservations->id}}" class="btn"><i class="fas fa-trash text-danger"></i></a>
                                <!-- modal -->
                                <div class="modal fade" style="margin-top: 200px" id="cancel{{$myReservations->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fas fa-trash text-danger"></i> Cancel Rreservation</h4>
                                            <button type="button" class="close border-danger" data-dismiss="modal" aria-label="Close">×</button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Are you sure to cancel the reservation with the driver Mr <br>
                                            <span class="text-primary">{{$myReservations->full_name}}</span>

                                        </p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a href="{{route('reservation.destroy',$myReservations->id)}}" class="btn btn-danger">Yes</a>

                                        </div>
                                    </div>
                                </div>
                                <!--/ modal -->
                        </td>

                    </tr>
                    @endforeach
            </table>


            @else<p class="ml-3 mt-3">You have no reservations</p>
            @endif
        </div>
        <!-- /.card-body -->
    </div>

</div>

@endsection
