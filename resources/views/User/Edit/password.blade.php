@extends('User.Edit.layoutEdit')

@section('user')

{{-- Edit Password --}}
<div class="col-md-9 edit-password">
  <form action="{{route('update.password',Session::get('users')->id)}}" method="post">
    @csrf()

    <div class="card" style="">


        <div class="row no-gutters">
            <div class="card-header pl-2 col-12">
                <h4 class="">Account security</h4>
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
            <div class="col-md-12">

                <div class="card-body mb-0 col-8 ">
                  <div class="form-group mb-1">
                    <label >Old Password</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror"name="old_password"value="">
                    @error('old_password')
                    <small class="alert">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"name="new_password" value="">
                    @error('new_password')
                    <small class="alert">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="form-group mb-0">
                    <label for="">Confirme Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"name="password_confirmation" value="">
                    @error('password_confirmation')
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


{{-- Edit Password --}}

@endsection
