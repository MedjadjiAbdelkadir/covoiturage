@extends('layouts.nav-bar')
@section('content')
    <div class="container create-res" style="margin-top: 100px; margin-bottom: 100px;">
            <div class="card col-sm-12 col-md-6 m-auto" style="border-radius: 10px">
                <div class="card-header border-bottom mb-4">
                    <h3 class="card-title">Add Réservation</h3>
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
                <form action="{{route('post.reservation' ,$post->id)}}" method="post">
                    @csrf
                    <div class="card-body  p-0 row">
                        <div class="timeline  timeline-inverse mb-0">
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-map-marker-alt bg-primary"></i>
                                <h3 class="ml-2 pl-5">{{ $post->state_départ}},{{ $post->municipal_départ}}</h3>
                            </div>

                            <!-- END timeline item -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-map-marker-alt bg-success"></i>
                                <h3 class="ml-2 pl-5 ">{{ $post->state_arrivé}},{{ $post->municipal_arrive}}</h3>
                            </div>

                        </div><!-- End timeline -->

                        <div class="input-group mb-3 mt-3 ml-4">
                            <select class="form-control col-6 @error('nbr_place_res') is-invalid @enderror"  name="nbr_place_res">
                                <option selected disabled hidden>Select Place Réserve</option>
                                @for($N = 1 ; $N <= $post->nbr_place ;$N++ )
                                    <option value="{{$N}}">{{$N}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="text-center mt-0 pl-3">
                            @error('nbr_place_res')
                            <small class="from-text text-danger  ml-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12 mb-4 mt-3">
                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                        </div>

                    </div><!-- /.End Card Body -->
                </form><!-- /.End Form -->
            </div> <!-- /.End Card -->
    </div><!-- /.End Container -->
@endsection


