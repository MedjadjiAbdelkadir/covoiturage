
{{-- ----------------------------- --}}

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
              <li class="breadcrumb-item"><a href="{{route('post.MesPost')}}">Mes Annonces</a></li>
              <li class="breadcrumb-item active">Edit Annonce</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section> <!-- /.section-breadcrumb -->

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Annonces</h3>
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
        <div class="card-body p-0" style="min-height: 100px;">
        @foreach($post as $post)
        <form class="row pl-3 pr-3 pt-1" action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">State Départ:</label>
                <input type="text" value="{{ $post->state_départ}}" class="form-control" id="taskTitle"  name="state_départ">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Municipal Départ:</label>
                <input type="text" value="{{ $post->municipal_départ}}" class="form-control" id=""  name="municipal_départ">
            </div>                               
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">State Arrivé:</label>
                <input type="text" value="{{ $post->state_arrivé}}" class="form-control" id="taskTitle"  name="state_arrivé">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Municipal Arrivé:</label>
                <input type="text" value="{{ $post->municipal_arrive}}" class="form-control" id="taskTitle"  name="municipal_arrive">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Date Départ:</label>
                <input type="date" value="{{ $post->date_départ}}" name="date_départ"class="form-control">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Time Départ:</label>
                <input type="time" value="{{ $post->time_départ}}" step="900"class="form-control" name="time_départ">
            </div>  
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Marke Car:</label>
                <select class="form-control" name="make_voiture" value="{{ $post->make_voiture}}">
                    
                    @foreach($makes as $data)
                     <option >{{$data->make}}</option>
                    @endforeach                                       
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Model Car:</label>
                <input type="text"  class="form-control" id="taskTitle" value="{{ $post->model_voiture}}" name="model_voiture">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Nombre Place Disponible:</label>
                <input type="text" class="form-control" id="taskTitle"  value="{{ $post->nbr_place}}" name="nbr_place">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Prix:</label>
                <input type="text"  class="form-control" id="taskTitle" value="{{ $post->prix}}" name="prix">
            </div>
            <div class="form-group col-12 mb-2"></div>
            <div class="form-group  col-md-3 col-sm-12">
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1"value="{{ $post->animale}}" name="animale">
                <label class="custom-control-label" for="customSwitch1">Animale</label>
                </div>
                
                    @if($post->animale ==1)
                        <script>
                        const checkbox_1 = document.getElementById('customSwitch1') ;
                        checkbox_1.checked = true
                        </script>
                    @endif
                
            </div>
            <div class="form-group  col-md-3 col-sm-12">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitch2"value="{{ $post->smoking}}"name="smoking">
                  <label class="custom-control-label" for="customSwitch2">Smoking</label>
                </div>
                @if($post->smoking ==1)
                    <script>
                        const checkbox_2 = document.getElementById('customSwitch2') ;
                        checkbox_2.checked = true
                    </script>
                @endif
            </div>
            <div class="form-group  col-md-3 col-sm-12">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitch3"value="{{ $post->music}}"name="music">
                  <label class="custom-control-label" for="customSwitch3">Music</label>
                </div>
                @if($post->music ==1)
                    <script>
                        const checkbox_3= document.getElementById('customSwitch3') ;
                        checkbox_3.checked = true
                    </script>
                @endif
            </div>
            <div class="form-group  col-md-3 col-sm-12">
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch4"value="{{ $post->climatiseur}}" name="climatiseur">
                <label class="custom-control-label" for="customSwitch4">Climatiseur</label>
                </div>
                @if($post->climatiseur ==1)
                    <script>
                        const checkbox_4= document.getElementById('customSwitch4') ;
                        checkbox_4.checked = true
                    </script>
                @endif
            </div> 

            <div class="col-sm-6 pt-3 mb-2">
                <a href="{{ route('home') }}" class="btn btn-danger  pl-4 pr-4">Canel</a>
            </div>
            <div class="col-sm-6 pt-3 mb-2 text-right">
                <button type="submit" class="btn btn-success pl-4 pr-4">Update</button>
            </div>
            

        </form>
        @endforeach
        </div> <!-- /.card-body -->
       
    </div>

</div>

@endsection