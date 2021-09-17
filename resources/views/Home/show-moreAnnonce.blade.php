@extends('layouts.nav-bar')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-8 mt-3">
                <div class="card p-2" style="border-radius: 9px">
                    <!-- user-block -->
                    <div class="user-block row pl-1 pt-2 mb-2">
                        <div class="col-md-9 col-sm-12">
                            <img class="img-circle img-bordered-sm"

                                 src="{{asset('images/users/userProfile/'.$posts->users->avatar)}}"
                                 alt="User Image">
                            {{-- {{asset('images/users/userProfile/'.Session::get('users')->avatar)}} --}}
                            <span class="username">
                                      <a href="">{{$posts->users->full_name}}</a>
                                    </span>
                            <span class="description">{{ $posts->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="col-lg-3 col-sm-12 text-right">
                            @if($posts->nbr_place > 0)
                                <a class="btn btn-success" href="{{route('reservation.create',$posts->id)}}">Reservation</a>
                            @else
                                <div class="btn btn-default" >Reservation</div>
                            @endif
                            {{-- <i class="fa fa-fan"></i> --}}
                        </div>
                    </div><!-- /.user-block -->
                    <div class="timeline timeline-inverse mb-0">
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-map-marker-alt bg-primary"></i>
                            <h3 class="ml-2 pl-5">{{ $posts->state_départ}},{{ $posts->municipal_départ}}</h3>
                            <div class="row ml-5">
                                <div class="col-md-7 col-sm-12">
                                    <span><i class="far fa-calendar mr-2"></i>{{ $posts->date_départ}} a {{ $posts->time_départ}}</span>  <br>
                                    <span><i class="fas fa-car mr-2"></i> {{ $posts->make_voiture}} {{ $posts->model_voiture}}</span> <br>
                                    <span><i class="fas fa-phone mr-2"></i>{{$posts->users->telphone}}</span>
                                </div>
                                <div class="col-lg-5 col-sm-12 mt-2">
                                    <h5 style="color:#782FEF" class="">{{$posts->prix}}da/Place</h5>
                                    <h6 class="card-text">
                                        @if($posts->nbr_place > 0)
                                            {{$posts->nbr_place}} Place Disponible
                                        @else
                                            <p class="text-danger">Reservation Completed</p>
                                        @endif
                                    </h6>
                                </div>

                            </div>
                        </div>

                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-map-marker-alt bg-success"></i>
                            <h3 class="ml-2 pl-5 ">{{ $posts->state_arrivé}},{{ $posts->municipal_arrive}}</h3>
                        </div>
                        <div>
                            @if($posts->music ==1)
                                <span class="mr-2  ml-5 border-success" style="border: 2px solid; padding: 6px 8px;border-radius: 50%;height: 37px">
                            <i class="fas fa-music" style="color:#8C8C8C;"></i>
                        </span>
                            @else
                                <span class="mr-2  ml-5 border-danger" style="border: 2px solid; padding: 6px 8px;border-radius: 50%;height: 37px">
                            <i class="fas fa-music" style="color:#DAE4E5;" ></i>
                        </span>
                            @endif
                            @if($posts->smoking ==1)
                                <span class="mr-2 border-success" style="border: 2px solid; padding: 6px 8px;border-radius: 50%;height:37px;">
                            <i class="fas fa-smoking pt-0" style="color:#8C8C8C;" ></i>
                        </span>
                            @else
                                <span class="mr-2 border-danger text-center" style="border: 2px solid; padding: 6px 8px;border-radius: 50%;height:37px;">
                            <i class="fas fa-smoking pt-0" style="color:#DAE4E5;" ></i>
                        </span>
                            @endif
                            @if($posts->animale ==1)
                                <span id="animale" class="mr-2 border-success text-center" style="border: 2px solid; padding: 6px 8px;border-radius: 50%;height: 37px">
                            <i class="fas fa-paw pl-1" style="color:#8C8C8C;" ></i>
                        </span>
                            @else
                                <span id="animale" class="mr-2 border-danger text-center" style="border: 2px solid; padding: 6px 8px;border-radius: 50%;height: 37px">
                                <i class="fas fa-paw pl-1" style="color:#DAE4E5;" ></i>
                            </span>
                            @endif
                            @if($posts->climatiseur ==1)
                                <span class="border-success" style="border: 2px solid; padding: 6px 8px;border-radius: 50%;height: 37px">
                                <svg class="svg-success" height="20pt" viewBox="0 -24 448 448" width="15pt" xmlns="http://www.w3.org/2000/svg"><path d="m40 200h368v8h-368zm0 0"/><path d="m448 24c0-13.253906-10.746094-24-24-24v24c-.027344 22.082031-17.917969 39.972656-40 40h-320c-22.082031-.027344-39.972656-17.917969-40-40v-24c-13.253906 0-24 10.746094-24 24v160c0 13.253906 10.746094 24 24 24v-64c0-4.417969 3.582031-8 8-8h384c4.417969 0 8 3.582031 8 8v64c13.253906 0 24-10.746094 24-24zm-200 104h-64c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h64c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm144-32h-8c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h8c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm32 0h-8c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h8c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm0 0"/><path d="m40 176h368v8h-368zm0 0"/><path d="m384 48c13.253906 0 24-10.746094 24-24v-24h-368v24c0 13.253906 10.746094 24 24 24zm0 0"/><path d="m40 152h368v8h-368zm0 0"/><path d="m216 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/><path d="m152 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/><path d="m280 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/></svg>
                            </span>
                            @else
                                <span class="border-danger" style="border: 2px solid; padding: 6px 8px;border-radius: 50%;height: 37px">
                                <svg class="svg-danger" height="20pt" viewBox="0 -24 448 448" width="15pt" xmlns="http://www.w3.org/2000/svg"><path d="m40 200h368v8h-368zm0 0"/><path d="m448 24c0-13.253906-10.746094-24-24-24v24c-.027344 22.082031-17.917969 39.972656-40 40h-320c-22.082031-.027344-39.972656-17.917969-40-40v-24c-13.253906 0-24 10.746094-24 24v160c0 13.253906 10.746094 24 24 24v-64c0-4.417969 3.582031-8 8-8h384c4.417969 0 8 3.582031 8 8v64c13.253906 0 24-10.746094 24-24zm-200 104h-64c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h64c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm144-32h-8c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h8c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm32 0h-8c-4.417969 0-8-3.582031-8-8s3.582031-8 8-8h8c4.417969 0 8 3.582031 8 8s-3.582031 8-8 8zm0 0"/><path d="m40 176h368v8h-368zm0 0"/><path d="m384 48c13.253906 0 24-10.746094 24-24v-24h-368v24c0 13.253906 10.746094 24 24 24zm0 0"/><path d="m40 152h368v8h-368zm0 0"/><path d="m216 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/><path d="m152 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/><path d="m280 400c-4.417969 0-8-3.582031-8-8-.148438-10.257812 3.140625-20.269531 9.34375-28.441406 8.875-11.535156 8.875-27.597656 0-39.132813-12.457031-16.914062-12.457031-39.964843 0-56.875 4.445312-5.53125 6.800781-12.453125 6.65625-19.550781 0-4.417969 3.582031-8 8-8s8 3.582031 8 8c.148438 10.253906-3.140625 20.257812-9.34375 28.425781-8.875 11.527344-8.875 27.585938 0 39.117188 12.445312 16.921875 12.445312 39.96875 0 56.890625-4.445312 5.539062-6.800781 12.464844-6.65625 19.566406 0 4.417969-3.582031 8-8 8zm0 0"/></svg>
                            </span>
                            @endif
                        </div>
                    </div><!-- End timeline -->

                </div>



        </div>
    </div>
</div>
@section('content')

@endsection
