
@extends('User.Edit.layoutEdit')
@section('user')


{{-- Start Edit Profile --}}
  <div class="col-sm-9 edit-profile">

      <form action="{{route('update.profile',Session::get('users')->id)}}"method="post">
        @csrf()
        <div class="card" style="">
          <div class="row no-gutters">
              <div class="card-header pl-2 col-12">
                  <h4 class="">Public Profile</h4>
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

                  <div class="col-md-8">
                        <div class="card-body ">
                          <div class="form-group">
                            <label for="inputName">User Name</label>
                            <input type="text" class="form-control @error('old_password') is-invalid @enderror" name="full_name" value="{{Session::get('users')->full_name}}">
                            @error('full_name')
                               <small class="alert">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="inputName">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"value="{{Session::get('users')->email}}">
                            @error('email')
                               <small class="alert">{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group mb-0">
                            <label for="inputName">Tel</label>
                            <input type="text" class="form-control @error('telphone') is-invalid @enderror"name="telphone" value="{{Session::get('users')->telphone}}">
                            @error('telphone')
                                <small class="alert">{{ $message }}</small>
                            @enderror
                          </div>
                        </div>
                  </div>
                  <div class="col-12 mt-0 ml-3">
                    <input type="submit" value="Save Changes" class="btn btn-success form-group col-4">
                  </div>

          </div>
        </div>
      </form>
  </div>
{{-- End Edit Profile --}}

@endsection
