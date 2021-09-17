@extends('layouts.nav-bar')
@section('content')
@if(Session::has('users'))
  <!-- Main content -->
     <section class="content mt-5">
        <div class="container">
            <!-- container-fluid -->
             <div class="container-fluid">
               <div class="row mb-2">
                   <div class="col-sm-3">
                       <div class="media-profile">
                            <div class="media">
                              <img src="{{asset('images/users/userProfile/'.Session::get('users')->avatar)}}" class="mr-2 img-circle" style="height: 65px;width:65px">

                                <div class="media-body mt-2">
                                    <h5 class="mt-0 mb-0">{{Session::get('users')->full_name}}</h5>
                                    <p>Your personal account</p>
                                </div>
                            </div>
                       </div>
                       <div class="card">
                         <a href="{{url('/user/'.Session::get('users')->id)}}"class="list-group-item list-group-item-action">View Profile</a>
                         <a href="{{url('/user/edit-profile/'.Session::get('users')->id)}}" class="list-group-item list-group-item-action">Edit Profile</a>
                         <a href="{{url('/user/edit-photo/'.Session::get('users')->id)}}" class="list-group-item list-group-item-action">Edit Photo Profile</a>
                         <a href="{{url('/user/edit-password/'.Session::get('users')->id)}}"class="list-group-item list-group-item-action">Change Password</a>
                         <a data-toggle="modal" data-target="#delete{{Session::get('users')->id}}" class="list-group-item list-group-item-action">Delete Account</a>
                        </div>
                   </div>
                  @yield('user')
                  {{-- Start Delete Profile --}}
                    <!--modal -->
                    <div class="modal fade" style="margin-top: 200px" id="delete{{Session::get('users')->id}}">
                      <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title"><i class="fas fa-trash text-danger"></i> Delete Acount</h4>
                              <button type="button" class="close border-danger" data-dismiss="modal" aria-label="Close">×</button>
                          </div>
                          <div class="modal-body">
                          <h5>{{Session::get('users')->full_name}}</h5>
                          <p>Are you sure you want to delete your Account?</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default col-3" data-dismiss="modal">Go Back</button>
                          <a href="{{route('user.destroy',Session::get('users')->id)}}" class="btn btn-danger col-3">Yes,Delete</a>
                          </div>
                      </div>
                    </div>
                    <!--/ modal -->
                    {{-- End Delete Profile --}}
               </div>
             </div>
             <!-- /.container-fluid -->
            </div>
     </section>
  <!-- /.content -->
@endif
@endsection

