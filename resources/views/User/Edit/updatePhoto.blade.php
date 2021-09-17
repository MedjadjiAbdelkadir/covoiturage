@extends('User.Edit.layoutEdit')

@section('user')
{{-- Start Edit Photo Profile --}}

<div class="col-md-9 edit-password">
  <form action="{{route('user.updatePhotoProfile',Session::get('users')->id)}}" method="post"  enctype="multipart/form-data">
    @csrf()

    <div class="card" style="">


        <div class="row no-gutters">
            <div class="card-header pl-2 col-12">
                <h4 class="">Edit Photo Profile</h4>
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
                <div class="card-body mb-0 col-12">
                  <div class="profile-pic col-md-12 m-auto box-profile">
                    <label class="-label text-center" id="change-img" for="file">
                      <span class="fa fa-camera"></span>
                    </label>
                    <input id="file" style="" name="photo"type="file" onchange="loadFile(event)"/>
                    <img src="{{asset('images/users/userProfile/'.Session::get('users')->avatar)}}"   id="output"height="200" width="200" />
                </div>

                </div>
            </div>
            <div class="col-12 mt-3  text-center">
              <input type="submit" value="Save Changes" class="btn btn-success form-group col-4">
            </div>

        </div>

      </div>
  </form>
</div>

{{-- End Edit Photo Profile --}}

@endsection
{{--
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 m-auto  ">
          <!-- general form elements -->
          @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
          @endif
          <div class="card mt-5">
            <form action="{{route('user.updatePhotoProfile',Session::get('users')->id)}}" method="post"  enctype="multipart/form-data">
                @csrf()
                <div class="card-body">
                    <div class="form-group">
                      <label for="">Picture Offers :</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="" name="photo">
                          <label class="custom-file-label" >Choose Photos Profile</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer ">
                    <button type="submit" class="btn btn-primary form-control">Photo</button>
                  </div>
            </form>
          </div>

        </div>


      </div>
      <!-- /.row -->
    </div>
</section> --}}

