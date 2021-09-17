@extends('layouts.nav-bar')

@section('content')
<div class="container">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('post.create')}}">Add Annonce</a></li>
            <li class="breadcrumb-item active">Step 1</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
</section> <!-- /.section-breadcrumb -->
<div class="card">
    <div class="card-header border-bottom mb-3">
      <h3 class="card-title">Basic Info</h3>
    </div>
    <div class="card-body p-0" style="min-height: 330px;">
        <form class="row pl-3 pr-3" action="{{ route('post.create.step.one.post') }}" method="POST">
            @csrf
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">State Départ:</label>
                <input type="text" value="{{ $dataPost->state_départ ?? '' }}" class="form-control" id="taskTitle"  name="state_départ">
            </div> 
            
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Municipal Départ:</label>
                <input type="text" value="{{ $dataPost->municipal_départ ?? '' }}" class="form-control" id=""  name="municipal_départ">
            </div>                               
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">State Arrivé:</label>
                <input type="text" value="{{ $dataPost->state_arrivé ?? '' }}" class="form-control" id="taskTitle"  name="state_arrivé">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Municipal Arrivé:</label>
                <input type="text" value="{{ $dataPost->municipal_arrive ?? '' }}" class="form-control" id="taskTitle"  name="municipal_arrive">
            </div>

            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Date Départ:</label>
                <input type="date" value="{{ $dataPost->date_départ ?? '' }}" name="date_départ"class="form-control">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="title">Time Départ:</label>
                <input type="time" value="{{ $dataPost->time_départ ?? '' }}" class="form-control" name="time_départ">
            </div> 
            <div class="col-sm-6 pt-3">
                <a href="{{ route('post.create') }}" class="btn btn-danger pl-4 pr-4">Previous</a>
            </div>
            <div class="col-sm-6  pt-3 text-right">
                <button type="submit" class="btn btn-primary pl-5 pr-5">Next</button>
            </div>
        </form><!-- End Form -->
    </div> <!-- End Card Body-->
</div> <!-- End Card -->

</div>
@endsection



{{-- --------------------------------------------- --}}
