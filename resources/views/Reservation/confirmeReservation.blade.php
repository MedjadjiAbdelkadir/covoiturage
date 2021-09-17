@extends('layouts.nav-bar')


@section('content')
    <div class="container create-res" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="card col-sm-12 col-md-6 m-auto" style="border-radius: 10px">
            <div class="card-header border-bottom mb-4">
                <h3 class="card-title h2">Confirm Réservation</h3>

                <div class="card-tools">
                    <div class="input-group mr-3" style="width: 20px;">
                        <i class="far fa-check-circle fa-2x mr-1 "></i>
                    </div>
                </div>
            </div><!-- /.End Card Header -->
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
            <form action="{{route('confirm.reservation')}}" method="post" >
                <input type="hidden" value="{{$nbr}}" name="nbr_res">
                <input type="hidden" value="{{$post->id}}" name="post_id">
                @csrf
                <div class="card-body  p-0 row pb-4">
                    <p class="pl-3">Are you sure to reserve this Annonce with the driver<br>Mr:
                        <span class="text-primary">{{$post->users->full_name}}</span> <br>
                    </p>

                    <div class="col-sm-6 pt-3">
                        <a href="{{ route('post.create') }}" class="btn btn-danger pl-4 pr-4">No</a>
                    </div>
                    <div class="col-sm-6  pt-3 text-right">
                        <button type="submit" class="btn btn-primary pl-5 pr-5">Yes</button>
                    </div>
                </div><!-- /.End Card Body -->
            </form><!-- /.End Form -->
        </div> <!-- /.End Card -->
    </div><!-- /.End Container -->








@endsection


