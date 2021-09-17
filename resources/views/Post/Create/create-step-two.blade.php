

{{-- ----------------------------------------- --}}
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
            <li class="breadcrumb-item"><a href="{{route('post.create')}}">Add Annonce</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.create.step.one')}}">Step 1</a></li>
            <li class="breadcrumb-item active">Step 2</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
</section> <!-- /.section-breadcrumb -->
<div class="card mb-5">
    <div class="card-header border-bottom mb-3">
      <h3 class="card-title">Conditions of the trip</h3>
    </div>
    <div class="card-body p-0" style="min-height: 300px;">
        <form class="row pl-3 pr-3" action="{{ route('post.create.step.two.post') }}" method="POST">
            @csrf
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Marke Car:</label>
                <select class="form-control" name="make_voiture" value="{{ $dataPost->make_voiture ?? '' }}">
                    <option selected disabled hidden>Select Marke</option>
                    @foreach($makes as $data)
                     <option >{{$data->make}}</option>
                    @endforeach                                       
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Model Car:</label>
                <input type="text"  class="form-control" id="taskTitle" value="{{ $dataPost->model_voiture}}" name="model_voiture">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Nombre Place Disponible:</label>
                <input type="text" class="form-control" id="taskTitle"  value="{{ $dataPost->nbr_place}}" name="nbr_place">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Prix:</label>
                <div class="input-group mb-3">
                    <input type="text" placeholder=""  class="form-control" id="taskTitle" value="{{ $dataPost->prix }}" name="prix">
                    <div class="input-group-prepend">
                        <span class="input-group-text">da</span>
                    </div>
                </div>        
            </div>
            <div class="form-group col-12 mb-2"></div>
            <div class="form-group  col-md-3 col-sm-12">
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1"value="{{ $dataPost->animale}}" name="animale">
                <label class="custom-control-label " for="customSwitch1">Animale</label>
                </div>
            </div>
            <div class="form-group  col-md-3 col-sm-12">
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch2"value="{{ $dataPost->smoking}}"name="smoking">
                <label class="custom-control-label" for="customSwitch2">Smoking</label>
                </div>

            </div>
            <div class="form-group  col-md-3 col-sm-12">
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch3"value="{{ $dataPost->music}}"name="music">
                <label class="custom-control-label" for="customSwitch3">Music</label>
                </div>
            </div>
            <div class="form-group  col-md-3 col-sm-12">
                <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch4"value="{{ $dataPost->climatiseur}}" name="climatiseur">
                <label class="custom-control-label" for="customSwitch4">Climatiseur</label>
                </div>
            </div>  

            <div class="col-sm-6 pt-3 mb-2">
                <a href="{{ route('post.create.step.one') }}" class="btn btn-danger pl-4 pr-4">Previous</a>
            </div>
            <div class="col-sm-6  pt-3 mb-2 text-right">
                <button type="submit" class="btn btn-primary pl-4 pr-4">Next</button>
            </div>

        </form><!-- End Form -->
    </div> <!-- End Card Body-->
</div> <!-- End Card -->
</div>
@endsection



{{-- --------------------------------------------- --}}


