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
                <li class="breadcrumb-item active">Add Annonce</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section> <!-- /.section-breadcrumb -->
    <div class="card">
      <div class="card-header border-bottom">
        <h3 class="card-title">Add Annonce</h3>
      </div>
        <!-- /.card-header -->
        <div class="card-body text-center p-0 pl-3" style="min-height: 300px;">

                <h5 class="pt-5 mt-4">Welcome to our site, to add an Annonce, you must respect the terms</h5>
                
                <div class="condtion col-7 text-left pt-2" style="margin:0 auto">
                    <p class="card-text ">
                        <span class="bg-primary p-1 pl-2 pr-2" style="border-radius: 50%">1</span>
                        You must fill in all the information on the form
                    </p>
                    <p class="card-text">
                        <span class="bg-primary p-1 pl-2 pr-2" style="border-radius: 50%">2</span>
                        You have to abide by the timing and conditions of the trip
                    </p>
                    <p class="card-text">
                        <span class="bg-primary p-1 pl-2 pr-2" style="border-radius: 50%">3</span>
                        If you want to cancel the flight, you must cancel it at our location 2 days <br>
                        <span class="pl-4 mr-1"></span>
                        before the time specified in the form 
                    </p>
                </div>   
                <a href="{{route('post.create.step.one')}}" type="submit" class="btn btn-primary mt-4 mb-4">Accept the conditions</a>
 
        </div>
        <!-- /.card-body -->
    </div>

</div>

@endsection