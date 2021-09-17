
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
          <li class="breadcrumb-item active">All Message</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section> <!-- /.section-breadcrumb -->

         <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Message Contact</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body col-12 table-responsive p-0" style="min-height: 100px;">
              @if(isset($contacts) && $contacts ->count() > 0)
                  <table class="table table-head-fixed text-nowrap table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Sending Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i=1
                @endphp
                @foreach ($contacts as $contacts)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$contacts->full_name}}</td>
                    <td>{{$contacts->email}}</td>
                    <td>{{$contacts->phone}}</td>
                  <td>{{$contacts->created_at->format('d/m/Y')}}</td>
                  <td>

                      <a width="10px" href="{{route('admin.show.contact',$contacts->id)}}" class="btn">
                          <i class="fas fa-eye mr-2"></i>
                      </a>

                    <a width="10px" data-toggle="modal" data-target="#admindeletcontact{{$contacts->id}}" class="btn">
                        <i class="fas fa-trash-alt text-danger"></i>
                    </a>

                  </td>

                    <!-- modal -->
                        <div class="modal fade" style="margin-top: 200px" id="admindeletcontact{{$contacts->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><i class="fas fa-trash text-danger mr-1"></i>Delete Message</h4>
                                    <button type="button" class="close border-danger" data-dismiss="modal" aria-label="Close">×</button>
                                </div>
                                <div class="modal-body">
                                <p>Are you sure you want to delete the Message of <br><span class="text-primary">{{$contacts->full_name}}</span>  ?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="{{route('admin.destroy.contact',$contacts->id)}}" class="btn btn-danger">Yes</a>
                                {{-- {{route('post.destroy',$post->id)}} --}}
                                </div>
                            </div>
                        </div>
                        <!--/ modal -->


                </tr>
                @endforeach
              </tbody>
            </table>
              @else
                  <p class="ml-3">No messages </p>
              @endif
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

</div>

@endsection
