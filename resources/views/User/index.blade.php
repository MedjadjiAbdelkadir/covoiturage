@extends('User.Edit.layoutEdit')
@section('user')
    <div class="card col-sm-12 col-md-9 pl-0 pr-0 ">
        <div class="card-header mb-1 pl-2 mt-1">
            <h4 class="">Account Information</h4>
        </div>
        <div class="card-body p-0 pl-1  row pb-4" style="min-height: 100px;">
            <div class="col-sm-12 col-md-8 row">
                <div class="input-group col-sm-12 col-md-12 pt-2 pb-2 ">
                    <div class="input-group-prepend col-4">
                          <span class="mt-1 ml-1">
                              <span class="fas fa-user mr-1"></span>
                              User Name
                          </span>
                    </div>
                    <h1 class="form-control text-center col-8">
                        {{Session::get('users')->full_name}}
                    </h1>
                </div> <!-- End col-7 -->
                <div class="input-group col-sm-12 col-md-12 pt-2 pb-2 ">
                    <div class="input-group-prepend col-4">
                          <span class="mt-1 ml-1">
                              <span class="fas fa-envelope mr-1"></span>
                              Email
                          </span>
                    </div>
                    <h1 class="form-control text-center col-8 pl-0 pr-0">
                        {{Session::get('users')->email}}
                    </h1>
                </div> <!-- End col-7 -->
                <div class="input-group col-sm-12 col-md-12 pt-2 pb-2 ">
                    <div class="input-group-prepend col-4">

                          <span class="mt-1 ml-1">
                              <span class="fas fa-phone mr-1"></span>
                              Phone
                          </span>
                    </div>
                    <h1 class="form-control text-center col-8">
                        {{Session::get('users')->telphone}}
                    </h1>
                </div> <!-- End col-7 -->
                <div class="input-group col-sm-12 col-md-12 pt-2 pb-2 ">
                    <div class="input-group-prepend col-4">

                          <span class="mt-1 ml-1">
                              <i class="fas fa-birthday-cake mr-1"></i>
                              Date of birth
                          </span>
                    </div>
                    <h1 class="form-control text-center col-8">
                        {{Session::get('users')->birthday}}
                    </h1>
                </div> <!-- End col-7 -->
                <div class="input-group col-sm-12 col-md-12 pt-2 pb-2 ">
                    <div class="input-group-prepend col-4">
                              <span class="mt-1 ml-1">
                                  <i class="far fas fa-user-shield mr-1"></i>
                                  Role
                              </span>
                    </div>
                    <h1 class="form-control text-center col-8">
                        @if(Session::get('users')->is_admin) Admin @else Mombre @endif
                    </h1>
                </div> <!-- End col-7 -->

            </div> <!-- End col-8 -->
            <div class="col-sm-12 col-md-4 text-center mt-5">
                <div class="widget-user-image">
                    <img class="img-circle img-bordered-sm " style="width: 180px ; height: 180px"
                         src="{{asset( 'images/users/userProfile/'.Session::get('users')->avatar )}}"
                         alt="User Avatar">
                </div>

            </div> <!-- End col-4 -->

        </div> <!-- /.card-body -->

    </div>



@endsection
