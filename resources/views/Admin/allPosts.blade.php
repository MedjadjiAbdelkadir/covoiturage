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
              <li class="breadcrumb-item active">Annones</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section> <!-- /.section-breadcrumb -->


      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Annonces</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body col-12 table-responsive p-0" style="min-height: 100px;">
            @if(isset($posts) && $posts ->count() > 0)
              <table class="table table-head-fixed text-nowrap table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Driver</th>
                      <th class="text-center">Starting State </th>
                      <th class="text-center">Arrival State  </th>
                      <th class="text-center">Start Date</th>
                      <th class="text-center">Number of seats</th>
                      {{-- <th>Date of Publication</th> --}}

                    <th>Action</th>
                </tr>
                </thead>

                  <tbody>
                    @php
                    $i=1
                    @endphp
                    @foreach($posts as $posts)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$posts->users->full_name}}</td>
                        <td class="text-center">{{$posts->state_départ}}</td>
                        <td class="text-center">{{$posts->state_arrivé}}</td>

                        <td class="text-center">{{$posts->date_départ}} a {{$posts->time_départ}}</td>
                        <td class="text-center">{{$posts->nbr_place}}</td>

                   {{--  <td>{{$posts->created_at}}</td> --}}

                        <td class="">
                        <a href="{{route('admin.show-post',$posts->id)}}"class="btn">
                                <i class="fas fa-eye mr-1"></i>
                            </a>
                            <a data-toggle="modal" data-target="#admindeleteposts{{$posts->id}}" class="btn">
                                <i class="fas fa-trash text-danger"></i>
                            </a>
                            <!-- modal -->
                                <div class="modal fade" style="margin-top: 200px" id="admindeleteposts{{$posts->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fas fa-trash text-danger mr-1"></i>Delete Annonce</h4>
                                            <button type="button" class="close border-danger" data-dismiss="modal" aria-label="Close">×</button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Are you sure you want to delete the Annonce de <br><span class="text-primary">{{$posts->users->full_name}}</span>  ?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a href="{{route('admin.destroy.post',$posts->id)}}" class="btn btn-danger">Yes</a>
                                        {{-- {{route('post.destroy',$post->id)}} --}}
                                        </div>
                                    </div>
                                </div>
                                <!--/ modal -->
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
              </table>
            @else
                <p class="ml-3">There are no Annonces</p>
            @endif
        </div>
        <!-- /.card-body -->
      </div>

</div>

@endsection
