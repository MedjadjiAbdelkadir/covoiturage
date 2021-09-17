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
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section> <!-- /.section-breadcrumb -->


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users</h3>
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
              @if(isset($data) && $data ->count() > 0)
                 <table class="table table-head-fixed text-nowrap table-striped">
              <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Avatar</th>
                    <th>Roles</th>
                    <th>Phone</th>
                    <th>Date Of Join</th>
                    <th>Action</th>
                </tr>
              </thead>
                <tbody>
                  @php
                  $i =1
                  @endphp
                    @foreach($data as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$data->full_name}}</td>
                        <td>
                            <img src="{{asset( 'images/users/userProfile/'.$data->avatar )}}"
                                alt="User Avatar"class="img-circle" style="height: 45px;width:45px">
                        </td>
                        <td>
                            @if($data->is_admin)
                                Admin
                            @else
                                Membre
                            @endif
                        </td>
                        <td>{{$data->telphone}}</td>
                        <td>{{  $data->created_at }}</td>

                        <td class="pl-0 pr-0">

                            <a href="{{route('admin.show.user',$data->id)}}"class="btn">
                                <i class="fas fa-eye mr-2"></i>
                            </a>
                            <a data-toggle="modal" data-target="#admindeleteuser{{$data->id}}" class="btn"><i class="fas fa-trash text-danger"></i></a>

                                <!-- modal -->
                                <div class="modal fade" style="margin-top: 200px" id="admindeleteuser{{$data->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title"><i class="fas fa-trash text-danger mr-1"></i>Delete User</h4>
                                            <button type="button" class="close border-danger" data-dismiss="modal" aria-label="Close">×</button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Are you sure you want to delete the user account <br><span class="text-primary">{{$data->full_name}}</span>  ?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a href="{{route('admin.destroy.user',$data->id)}}" class="btn btn-danger">Yes</a>
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
                  <p class="ml-3">There are no members </p>
              @endif
          </div>
          <!-- /.card-body -->
        </div>



</div>

@endsection
