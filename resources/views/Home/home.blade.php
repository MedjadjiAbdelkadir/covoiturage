@extends('layouts.nav-bar')   <!-- extend nav bar  -->


@section('content')
     @if(Session::has('users'))
      @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible col-12 text-center">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{Session::get('success')}}
        </div>
      @endif
    @endif




    @if(!Session::has('users'))
        {{-- Start Header Main  --}}
        <section class="header-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Car <span>Sharing</span></h3>
                        <h6>
                            Car sharing management, you can find accompanying car suggestions that fit your habits,
                            simple and easy to use, saving <span>time</span> and <span>money</span> <br>
                        </h6>
                        <div class="last-item">
                            <a href="{{url('register')}}"class="register-link">Get Started</a>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('home/img/img-header.jpg')}}" alt="">
                    </div>
                </div>
            </div>

            {{-- Car Sharing
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <h1 class="h3">
    </h1>
                <div class="overlay"></div>

                <div class="carousel-item carousel-one active">
                <img src="{{asset('home/img/carousel-img-1.jpg')}}" class="d-block w-100" alt="" srcset="">
                </div>

                <div class="carousel-item carousel-tow">
                  <img src="{{asset('home/img/carousel-img-3.jpg')}}" class="d-block h-100 w-100" alt="" srcset="">

                </div>
                <div class="carousel-item carousel-three">
                  <img src="{{asset('home/img/carousel-img-2.jpg')}}" class="d-block h-100 w-100" alt="" srcset="">
                </div>
              </div>

              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              </ol>
            </div>
          </div>
           --}}
        </section>
        {{-- End Header Main --}}
    @endif

{{-- Start Section Search Page --}}

<section  class="header-search">
    {{-- <div class="overlay"></div> --}}
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-5 col-lg-7">
            {{-- img-search --}}
              <img src="{{asset('home/img/img-search.png')}}" class="d-block h-100 w-100"alt="">
          </div><!-- End col-7 -->
          <div class="col-sm-12 col-md-7 col-lg-5">
            <div class="card">
              <div class="card-header">
                <h1 class="h3 text-center">Search for an Announcement</h1>
              </div>
              <div class="card-body">
                  <form action="{{route('post.resultSearch')}}" method="post">
                      @csrf
                      <div class="input-group col-12 pt-2 pb-2">
                          <div class="input-group-prepend">
                      <span class="mt-1 ml-1">
                        <i class="fas fa-map-marker-alt text-primary mr-1" ></i>
                      </span>
                          </div>
                          <input type="text" class="form-control"  placeholder="State Départ" name="state_départ" >
                      </div>

                      <div class="input-group col-12 pt-2 pb-2 mt-4">
                          <div class="input-group-prepend">
                      <span class="mt-1 ml-1" style="">
                        <i class="fas fa-map-marker-alt text-success mr-1" "></i>
                      </span>
                          </div>
                          <input type="text" class="form-control"placeholder="State Arrivé" name="state_arrivé">
                      </div>

                    <div class="input-group col-12 pt-2 pb-2 mt-4"style="">

                        <input type="date" value="" name="date_départ"class="form-control">
                    </div>

                    <div class="input-group col-12 mt-4 p-0 text-white">

                        <div  type="submit" class="btn text-center col-12 p-2 "  >
                            <i class="fas fa-search mr-0 pr-0"></i>
                            <button type="submit" class="btn ml-0 pl-0" style="">Search</button>
                        </div>
                    </div>
                </form><!-- End Form -->

              </div><!-- End Card Body -->

            </div>
          </div> <!-- End col-5 -->
        </div><!-- Row -->
      </div><!-- End Container -->
  </section><!-- End Section -->

{{-- End Section Search Page --}}

     {{-- Start Page Annonce --}}

     <section class="annonce text-center" id="annonce">
         {{-- Start Container --}}
         <div class="container">
             <h2>Last Annonce </h2>
             <p class="text-center">See the latest flights can be booked without searching</p>
             {{-- Start Row --}}
             <div class="row">
                 @foreach($allPosts as $allPosts)
                 <div class="col-sm-12 col-md-6 col-lg-4 mb-3 card">
                     <div class="card-body pl-2 pr-0">
                         <div class="timeline  timeline-inverse  mb-3">
                             <!-- timeline item -->
                             <div class="text-left">
                                 <i class="fas fa-map-marker-alt bg-primary"></i>
                                 <h3 class="ml-2 pl-5">{{ $allPosts->state_départ}},{{ $allPosts->municipal_départ}}</h3>
                                 <div class="row ml-5">
                                     <div class="col-md-12 col-sm-12 mb-0">
                                         {{--                                     <span> <img src="{{asset('home/driver-icon.png')}}" style="width: 16px">Medjadji Abdelkadir</span> <br>--}}
                                         <span><i class="far fa-calendar mr-2"></i>{{ $allPosts->date_départ}} </span>  <br>
                                         {{--                                     <span><i class="fas fa-car mr-2"></i> Audi A4</span> <br>--}}
                                         @if($allPosts->nbr_place > 0)
                                             {{$allPosts->nbr_place}} Place Disponible
                                         @else
                                             <p class="text-danger">Reservation Completed</p>
                                         @endif
                                         <br>
                                         <span  class=""><span style="color:#ec1c23">{{$allPosts->prix}} </span> da/Place</span>
                                     </div>
                                 </div>
                             </div>

                             <!-- END timeline item -->
                             <!-- timeline item -->
                             <div class="text-left mt-0 pb-0 mb-0">
                                 <i class="fas fa-map-marker-alt bg-success"></i>
                                 <h3 class="ml-2 pl-5 ">{{ $allPosts->state_arrivé}},{{ $allPosts->municipal_arrive}}</h3>
                             </div>
                             <div class="col-12 text-left ml-5 mb-0 pt-0 show-more">
                                 <a href="{{route('show.moreAnnonce',$allPosts->id)}}" class="btn mb-0">Show More</a>
                             </div>
                         </div><!-- End timeline -->
                     </div>

                 </div>
                 @endforeach

                 <br>
                 <h6 class="text-center m-auto"><a href="{{url('posts')}}" class="btn btn-primary">See ALL Trip</a> </h6>

             </div>
             {{-- End Row --}}


         </div>
         {{-- End Container --}}

     </section>

     {{-- End Page Annonce --}}
@if(!Session::has('users'))
{{-- Start Page Features --}}

<section class="features text-center" id="features">
      {{-- Start Container --}}
      <div class="container">
          <h2>Features</h2>
          {{-- Start Row --}}
          <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-4 card">
                <div class="card-body">
                  <h6><i class="fa fa-usd fa-2x rounded-circle"></i></h6>
                  <h4>Saving Money</h4>
                  <p>The cost of the journey among passengers is much lower compared to regular flights</p>
                </div>
              </div>

              <div class="col-sm-12 col-md-6 col-lg-4 card">
                <div class="card-body">
                  <h6> <i class="fa fa-users fa-2x rounded-circle"></i></h6>
                  <h4>New Friends</h4>
                  <p>It is a new technological way to find  <br>safe and friendly riding partners, while considering
                     the circumstances of the passenger and the vehicle owner</p>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 card">
                <div class="card-body">
                  <h6><i class="fa fa-clock-o fa-2x rounded-circle"></i></h6>
                  <h4>Save Time</h4>

                    <p>Find trips in a short time according to the desires you want</p>
                </div>

              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 card">
                <div class="card-body">
                  <h6><i class="fa fa-heart fa-2x rounded-circle"></i></h6>
                  <h4>Lifestyle change</h4>
                  <p>Make moving away from relying on self-owned cars to shared services and active transportation</p>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-4 card">
                <div class="card-body">
                  <h6> <i class="fas fa-traffic-light fa-2x rounded-circle"></i> </h6>
                  <h4>Declutter congestion</h4>
                  <p>Reducing traffic congestion in major cities and reducing energy consumption</p>
                </div>

              </div>

              <div class="col-sm-12 col-md-6 col-lg-4 card">
                <div class="card-body">
                  <h6><i class="fa fa-leaf fa-2x rounded-circle"></i></h6>
                  <h4>Preserving The Environment</h4>
                  <p>Preserving the environment by preventing global warming by reducing carbon dioxide emissions</p>
                </div>
              </div>
          </div>
          {{-- End Row --}}


      </div>
      {{-- End Container --}}

  </section>

{{-- End Page Features --}}

{{-- Start Page Comment Ca Marche --}}

<section class="comment-ca-marche" id="Its-Works">
  <div class="container">
      <h1 class="text-center h2">How it works</h1>
      <div class="row">
          <div class="col-md-6 mb-5">
              <div class="media">
                  <h4 class="mr-2 text-white p-1 pl-2 pr-2 rounded-circle">1</h4>
                  <div class="media-body">
                    <h2 class="mt-1">Join our site</h2>
                    <p>
                      Create your own account on our website in case you do not have an account and the registration
                      did not take longer. We are keen to make it easy for you to join us on the site
                    </p>
                    <h5>
                        <a href="{{url('register')}}"class="mt-2  register-link">Get Started</a>
                    </h5>
                 </div>
              </div>
          </div>
          <div class="col-md-6 mb-5">
              <img src="home/img/join-image.jpg">
          </div>
          <div class="col-md-6 mb-5">
              <img src="home/img/page-work-performed.jpg">
          </div>
          <div class="col-md-6 mb-5">
              <div class="media">
                  <h4 class="mr-2 text-white pt-1 pb-1 pl-2 pr-2 rounded-circle">2</h4>
                  <div class="media-body">
                    <h2 class="mt-1">Help us get to know you</h2>
                    <p>
                      After registering, we will ask you to provide us with some information about the state,
                      the city in which you reside, and the states you wish to visit or have relatives in. We will
                       immediately inform you about the offers of drivers who are not in the same countries and cities
                       that you are interested in
                    </p>
                    <h5>
                      <a href=""class="mt-2 link text-uppercase">Lire La Suite</a>
                   </h5>
                  </div>
              </div>
          </div>
          <div class="col-md-6">
              <div class="media">
                  <h4 class="mr-2 text-white pt-1 pb-1 pl-2 pr-2 rounded-circle">3</h4>
                  <div class="media-body">
                    <h2 class="mt-1">Compare prices and conditions</h2>
                    <p>
                      You will receive, within a few minutes, several quotes. Then visit their freelance profiles and
                      compare them with the help of the rating on their account
                    </p>
                    <h5>
                      <a href=""class="mt-2 link text-uppercase">Lire La Suite</a>
                    </h5>
                  </div>
              </div>
          </div>
          <div class="col-md-6 mb-5">
              <img src="home/img/showprofiles.jpg">
          </div>
          <div class="col-md-6 mb-5">
              <img src="home/img/select-concept.jpg">
          </div>
          <div class="col-md-6 mb-5">
              <div class="media">
                  <h4 class="mr-2 pt-1 pb-1 pl-2 pr-2 text-white rounded-circle">4</h4>
                  <div class="media-body">
                    <h2 class="mt-1">Choose your driver</h2>
                    <p>
                      Contact and negotiate with drivers who have the same destination you want to go to
                    </p>
                    <h5>
                      <a href=""class="mt-2 link text-uppercase">Lire La Suite</a>
                    </h5>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

{{-- End Page Comment Ca Marche --}}


{{-- Start Page Contact --}}

<section class="contact-section" id="contact">
  @if(Session::has('receiptMessage'))
    <div class="alert alert-success alert-dismissible col-12 text-center">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{Session::get('receiptMessage')}}
    </div>
  @endif
  <div class="container">
    <h1 class="h2 text-center">Contact Us</h1>
    <div class="row">
      <div class="col-lg-6 col-sm-12 mb-2">
        <img src="home/img/contact-us-image.png"  class="d-block w-100" style="height: 80%" >
      </div>
      <div class="col-lg-6 col-sm-12">
        <form action="{{route('contact.store')}}" method="post" class="ml-3 card">
          @csrf
            <div class="input-group col-12 pt-2 pb-2"style="">
              <label class="col-12 mb-0 ml-4">Full Name</label>
                <div class="input-group-prepend">
                  <span class="pt-1" style="">
                    <i class="fas fa-user mr-1"></i>
                  </span>
                </div>
                <input type="text" class="form-control mt-0 @error('full_name') is-invalid @enderror" placeholder="Enter Your username" name="full_name" >
            </div>
            @error('full_name')
              <small class="from-text text-danger text-center"">{{ $message }}</small>
            @enderror
            <div class="input-group col-sm-12 pt-2 pb-2">
              <label class="col-12 mb-0 ml-4">Email</label>
              <div class="input-group-prepend">
                <span class="pt-1" style="">
                  {{-- <i class="fas fa-user text-primary mr-1" style=""></i> --}}
                  <i class="fas fa-envelope mr-1"></i>
                </span>
              </div>
              <input type="text" class="form-control mt-0 @error('email') is-invalid @enderror" placeholder="Enter Your Email" name="email" >
            </div>
            @error('email')
              <small class="from-text text-danger text-center">{{ $message }}</small>
            @enderror
            <div class="input-group col-sm-12 pt-2 pb-2">
              <label class="col-12 mb-0 ml-4">Phone</label>
              <div class="input-group-prepend">
                <span class="pt-1">
                  {{-- <i class="fas fa-user text-primary mr-1" style=""></i> --}}
                  <i class="fas fa-phone mr-1"></i>
                </span>
              </div>
              <input type="text" class="form-control mt-0 @error('email') is-invalid @enderror" placeholder="Enter Your Phone" name="phone" >
            </div>
            @error('phone')
              <small class="from-text text-danger text-center">{{ $message }}</small>
            @enderror
            <div class="input-group col-sm-12 pt-2 pb-2">
              <label class="col-12 mb-0 ml-4">Message</label>
              <div class="input-group-prepend">
                <span class="pt-1">
                  <i class="fas fa-pencil-alt mr-1"></i>
                  {{-- <i class="fas fa-envelope mr-1 "></i> --}}
                </span>
              </div>
              <textarea type="text" class="form-control mt-0 @error('message') is-invalid @enderror"  placeholder="Enter Your Message" name="message"></textarea>
            </div>
            @error('message')
              <small class="from-text text-danger text-center"">{{ $message }}</small>
            @enderror
            <div class="input-group mt-4 col-sm-12 text-right">
              <button type="submit" class="btn ml-4" style="">Send Message</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</section>

{{-- End Page Contact --}}


{{-- Start Section FAQ'S Page --}}

<section  class="faqs-page" id="faqs-page" style="background-color: #fff; padding-top: 15px;">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12 col-md-6">
                     <h1 class="h3 text-center" style="padding-top: 60px;margin-bottom: 40px">FAQ'S</h1>
                     <div class="card "class="accordion" id="accordionExample" style="border:none ;box-shadow: none">
                         <div class="card-body"style="max-height: 450px">
                             <div class="input-group col-12 pb-2">
                                 <h6 class="mb-0 mt-0 col-10"><i class="fas fa-chevron-right mr-1"></i>How do I apply for a rodeME</h6>
                                 <div class="btn btn-link input-group-prepend col-1 ml-3 pt-0 text-righ"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                     <span class=" text-right" style="">
                                         <i class="fa fa-plus"></i>
                                     </span>
                                 </div>
                                 <div id="collapseOne" class="collapse pt-0 mt-0" aria-labelledby="headingOne" data-parent="#accordionExample">
                                     <div class="card-body pt-0 mt-0">
                                         Register by putting your personal information and then enter your starting point and destination, then book your seat
                                     </div>
                                 </div>
                             </div> <!-- End First Q-->
                             <div class="input-group col-12 mb-2">
                                 <h6 class=" mb-0 mt-0 col-10"><i class="fas fa-chevron-right mr-1"></i>Can I choose between a female or male driver</h6>
                                 <div class="btn btn-link input-group-prepend col-1 ml-3 pt-0 text-righ"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                     <span class=" text-right" style="">
                                         <i class="fa fa-plus"></i>
                                     </span>
                                 </div>
                                 <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                     <div class="card-body">
                                         Unfortunately this option is not yet available on the website, but you can browse the advertiser's account and find the gender.
                                     </div>
                                 </div>
                             </div> <!-- End Second Q-->
                             <div class="input-group col-12 mb-2">
                                 <h6 class="mb-0 mt-0 col-10"><i class="fas fa-chevron-right mr-1"></i>What are the conditions for creating a post</h6>
                                 <div class="btn btn-link input-group-prepend col-1 ml-3 pt-0 text-righ" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                     <span class=" text-right" style="">
                                         <i class="fa fa-plus"></i>
                                     </span>
                                 </div>
                                 <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                     <div class="card-body">
                                         Age over 24 years.
                                     </div>
                                 </div>
                             </div> <!-- End Third Q-->
                             <div class="input-group col-12 mb-2">
                                 <h6 class=" mb-0 mt-0 col-10"><i class="fas fa-chevron-right mr-1"></i>Is your service available every weekday or even <span class="ml-3">at night</span> </h6>
                                 <div class="btn btn-link input-group-prepend col-1 ml-3 pt-0 text-right"  data-toggle="collapse" data-target="#collapseFoor" aria-expanded="true" aria-controls="collapseOne">
                                     <span class=" text-right" style="">
                                         <i class="fa fa-plus"></i>
                                     </span>
                                 </div>

                                 <div id="collapseFoor" class="collapse" aria-labelledby="headingFoor" data-parent="#accordionExample">
                                     <div class="card-body">
                                         Yes, our driver-partners are available 24/7, you can apply at any time of the day.
                                     </div>
                                 </div>
                             </div> <!-- End Foor Q-->
                             <div class="input-group col-12 mb-2">
                                 <h6 class=" mb-0 mt-0 col-10"><i class="fas fa-chevron-right mr-1"></i>how to pay</h6>
                                 <div class="btn btn-link input-group-prepend col-1 ml-3 pt-0 text-right" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                     <span class=" text-right" style="">
                                         <i class="fa fa-plus"></i>
                                     </span>
                                 </div>
                                 <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                     <div class="card-body">
                                         There is only one way to pay, which is cash payment, either using a bank card will be approved soon
                                     </div>
                                 </div>

                             </div> <!-- End Five Q-->
                         </div>  <!-- End Card Body-->
                     </div><!-- End Card -->
                 </div> <!-- End col -->

                 <div class="col-sm-12 col-md-6">
                     {{-- img-search --}}
                     <img src="{{asset('home/img/FAQ1.jpg')}}" style="min-height: 500px" class="d-block h-100 w-100"alt="">
                 </div><!-- End col -->
             </div>
         </div>
     </section>

{{-- End Section FAQ'S  Page --}}
@endif


@endsection
