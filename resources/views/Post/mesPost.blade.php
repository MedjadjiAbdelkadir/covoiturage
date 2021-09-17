
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
                <li class="breadcrumb-item active">Mes Annonces</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section> <!-- /.section-breadcrumb -->

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Mes Annonces</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 180px;">
              {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}
                <a href="{{route('post.create')}}" class="btn btn-success p-1 pr-2"style="border-radius: 20px">
                  <i class="fa fa-plus bg-white p-2 mt-0" style="border-radius: 50%"></i>
                  <span class="text-white">Add Annonce</span>
                </a>
            </div>
          </div>
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
            @if(isset($post) && $post ->count() > 0)

            <table class="table table-head-fixed text-nowrap table-striped">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>State Départ</th>
                        <th>State Arrivé</th>
                        <th>Date And Time</th>
                        <th>Number of seats</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                       $i=1
                    @endphp

                    @foreach($post as $post)
                    <tr class="text-center">
                        <td>{{$i++}}</td>
                        <td>{{$post->state_départ}},{{$post->municipal_départ}}</td>
                        <td>{{$post->state_arrivé}},{{$post->municipal_arrive}}</td>

                        <td>{{date('d/m/Y \à ', strtotime($post->date_départ))}}{{date('H:i', strtotime($post->time_départ))}} </td>
                        <td>{{$post->nbr_place}}</td>
                        <td>{{$post->prix}} da</td>
                        <td>
                            <a href="{{route('post.show',$post->id)}}"  class="btn">
                                <i class="fas fa-eye text-info"></i>
                            </a>
                            <a  href="{{route('post.edit',$post->id)}}"  class="btn"><i class="fas fa-edit text-success"></i></a>
                            <a data-toggle="modal" data-target="#delete{{$post->id}}" class="btn "><i class="fas fa-trash text-danger"></i></a>

                            <!-- modal -->
                                <div class="modal fade" style="margin-top: 200px" id="delete{{$post->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fas fa-trash text-danger"></i> Delete Announcement</h4>
                                            <button type="button" class="close border-danger" data-dismiss="modal" aria-label="Close">×</button>
                                        </div>
                                        <div class="modal-body">

                                        <p>Are you sure you want to delete this Annonce</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a href="{{route('post.destroy',$post->id)}}" class="btn btn-danger">Delete</a>
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
            <p class="ml-3">You have no posts</p>
            @endif
        </div>
        <!-- /.card-body -->
    </div>

</div>

@endsection
