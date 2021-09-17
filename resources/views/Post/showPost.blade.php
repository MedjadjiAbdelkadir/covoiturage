@extends('layouts.nav-bar')
@section('content')
    <div class="container">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('post.MesPost')}}">Mes Annonces</a></li>
                            <li class="breadcrumb-item active">Show Details</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section> <!-- /.section-breadcrumb -->

        <div class="card mb-5">
            <div class="card-header mb-2">
                <h3 class="card-title">Show Details Annonce</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">


                        <div  class="form-control float-right">

                            {{date('d/m/Y', strtotime($data->created_at))}}
                        </div>

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-calendar-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 pl-1 pr-2 row mb-4" style="min-height: 100px;">
                <div class="input-group col-12 pt-2 pb-2 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-group-prepend col-5">
                          <span class="mt-1 ml-1">
                            <i class="fas fa-map-marker-alt text-primary mr-1"></i>
                              Starting City
                          </span>
                    </div>
                    <h1 class="form-control">
                        {{$data->state_départ}},{{$data->municipal_départ}}
                    </h1>
                </div>
                <div class="input-group col-12 pt-2 pb-2 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-group-prepend col-5">
                          <span class="mt-1 ml-1">
                            <i class="fas fa-map-marker-alt text-success mr-1"></i>
                              Arrival City
                          </span>
                    </div>
                    <h1 class="form-control">
                        {{$data->state_arrivé}},{{$data->municipal_arrive}}
                    </h1>
                </div>
                <div class="input-group col-12 pt-2 pb-2 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-group-prepend col-5">
                          <span class="mt-1 ml-1">
                            <i class="fas fa-calendar  mr-1"></i>
                              Start Date
                          </span>
                    </div>
                    <h1 class="form-control">

                        {{$data->date_départ}} a {{date('H:i', strtotime($data->time_départ))}}
                    </h1>
                </div>
                <div class="input-group col-12 pt-2 pb-2 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-group-prepend col-5">
                          <span class="mt-1 ml-1">
                            <i class="fas fa-users mr-1"></i>
                              Place Disp
                          </span>
                    </div>
                    <h1 class="form-control">
                        {{$data->nbr_place}}
                    </h1>
                </div>

                <div class="input-group col-12 pt-2 pb-2 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-group-prepend col-5">
                          <span class="mt-1 ml-1">
                            <i class="fas fa-car" text-primary mr-1"></i>
                              Car
                          </span>
                    </div>
                    <h1 class="form-control">
                        {{$data->make_voiture}} , {{$data->model_voiture}}
                    </h1>
                </div>
                <div class="input-group col-12 pt-2 pb-2 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-group-prepend col-5">
                          <span class="mt-1 ml-1">

                <img src="{{asset('home/dollar-icon.png')}}" style="width: 16px">

                              Prix
                          </span>
                    </div>
                    <h1 class="form-control">
                        {{$data->prix}} da
                    </h1>
                </div>
                <div class="input-group col-12 pt-2 pb-2 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-group-prepend col-5">
                              <span class="mt-1 ml-1">

                                <i class="fas fa-clipboard  mr-1"></i>
                                  Conditions
                              </span>
                    </div>
                    <h1 class="form-control text-center">
                        @if($data->music ==1)
                            <i class="fas fa-music text-success mr-2 ml-2 pl-1 pr-1" style="color:#8C8C8C;"></i>
                        @else
                            <i class="fas fa-music text-danger mr-2 ml-2 pl-1 pr-1" style="color:#8C8C8C;"></i>
                        @endif
                        @if($data->smoking ==1)
                            <i class="fas fa-smoking  text-success mr-2 ml-2 pl-1 pr-1" style="color:#8C8C8C;" ></i>
                        @else
                            <i class="fas fa-smoking  text-danger mr-2 ml-2 pl-1 pr-1" style="color:#8C8C8C;" ></i>
                        @endif
                        @if($data->animale ==1)
                                <span style="border:2px solid green; padding: 5px ;border-radius: 50%;margin: 1px">
                            <i class="fas fa-paw  text-success mr-2 ml-2 pl-1 pr-1" style="color:#8C8C8C;" ></i>
                                </span>
                        @else

                            <i class="fas fa-paw  text-danger mr-2 ml-2 pl-1 pr-1" style="color:#8C8C8C;" ></i>
                        @endif
                        @if($data->climatiseur ==1)
                            <style>
                                svg path{
                                    fill:green ;
                                }
                            </style>
                                <svg class="" height="20pt" viewBox="0 -24 448 448" width="15pt" xmlns="http://www.w3.org/2000/svg"><path d="m40 200h368v8h-368zm0 0"/><path d="m448 24c0-13.253906-10.746094-24-24-24v24c-.027344 22.082031-17.917969 39.972656-40 40h-320c-22.082031-.027344-39.972656-17.917969-40-40v-24c-13.253906 0-24 10.746094-24 24v160c0 13.253906 10.746094 24 24 24v-64c0-4.417969 3.582031-8 8-8h384c4.417969 0 8 3.582031 8 8v64c13.253906 0 24-10.746094 24-24zm-200 104h-64c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h64c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm144-32h-8c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h8c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm32 0h-8c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h8c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm0 0"/><path d="m40 176h368v8h-368zm0 0"/><path d="m384 48c13.253906 0 24-10.746094 24-24v-24h-368v24c0 13.253906 10.746094 24 24 24zm0 0"/><path d="m40 152h368v8h-368zm0 0"/><path d="m216 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/><path d="m152 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/><path d="m280 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/></svg>

                            @else
                                <style>
                                    svg path{
                                        fill:red ;
                                    }
                                </style>
                            <svg class="svg-danger-post" height="20pt" viewBox="0 -24 448 448" width="15pt" xmlns="http://www.w3.org/2000/svg"><path  fill="red" d="m40 200h368v8h-368zm0 0"/><path  fill="red" d="m448 24c0-13.253906-10.746094-24-24-24v24c-.027344 22.082031-17.917969 39.972656-40 40h-320c-22.082031-.027344-39.972656-17.917969-40-40v-24c-13.253906 0-24 10.746094-24 24v160c0 13.253906 10.746094 24 24 24v-64c0-4.417969 3.582031-8 8-8h384c4.417969 0 8 3.582031 8 8v64c13.253906 0 24-10.746094 24-24zm-200 104h-64c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h64c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm144-32h-8c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h8c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm32 0h-8c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h8c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm0 0"/><path d="m40 176h368v8h-368zm0 0"/><path d="m384 48c13.253906 0 24-10.746094 24-24v-24h-368v24c0 13.253906 10.746094 24 24 24zm0 0"/><path d="m40 152h368v8h-368zm0 0"/><path d="m216 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/><path d="m152 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/><path d="m280 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/></svg>

                        @endif
                    </h1>
                </div>

            </div> <!-- /.card-body -->


        </div><!-- End Card  -->

    </div>

    <style>

        svg-success path {
            fill: red;
        }

    </style>
@endsection
