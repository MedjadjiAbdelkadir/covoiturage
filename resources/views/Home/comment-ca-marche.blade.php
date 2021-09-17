{{-- 
    
    
1-Join our site :
 Create your own account on our website in case you do not have an account and the registration
 did not take longer. We are keen to make it easy for you to join us on the site

2-Help us get to know you:
 After registering, we will ask you to provide us with some information about the state,
 the city in which you reside, and the states you wish to visit or have relatives in. We will
  immediately inform you about the offers of drivers who are not in the same countries and cities 
  that you are interested in  
  
  

3 -Compare prices and conditions :
You will receive, within a few minutes, several quotes. Then visit their freelance profiles and 
compare them with the help of the rating on their account

4-Choose your driver :
Contact and negotiate with drivers who have the same destination you want to go to

--}}
@extends('layouts.nav-bar')
@section('content')
{{-- Start Page Comment Ca Marche --}}
    <div class="comment-ca-marche">
        <div class="container">
            <h1 class="text-center h2">Comment Ça Marche</h1>
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="media">
                        <h4 class="mr-2 bg-blue pt-1 pb-1 pl-2 pr-2 rounded-circle">1</h4>
                        <div class="media-body">
                          <h2 class="mt-1">Join our site</h2>
                          <p>
                            Create your own account on our website in case you do not have an account and the registration
                            did not take longer. We are keen to make it easy for you to join us on the site
                          </p> 
                          <h5>
                              <a href="{{url('register')}}"class="mt-2  register-link">Create Acount<i class="fas fa-chevron-right ml-1"></i></a>
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
                        <h4 class="mr-2 bg-blue pt-1 pb-1 pl-2 pr-2 rounded-circle">2</h4>
                        <div class="media-body">
                          <h2 class="mt-1">Help us get to know you</h2>
                          <p>
                            After registering, we will ask you to provide us with some information about the state,
                            the city in which you reside, and the states you wish to visit or have relatives in. We will
                             immediately inform you about the offers of drivers who are not in the same countries and cities 
                             that you are interested in 
                          </p>
                          <h5>
                            <a href="{{url('register')}}"class="mt-2  register-link">Create Acount<i class="fas fa-chevron-right ml-1"></i></a>
                         </h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="media">
                        <h4 class="mr-2 bg-blue pt-1 pb-1 pl-2 pr-2 rounded-circle">3</h4>
                        <div class="media-body">
                          <h2 class="mt-1">Compare prices and conditions</h2>
                          <p>
                            You will receive, within a few minutes, several quotes. Then visit their freelance profiles and 
                            compare them with the help of the rating on their account
                          </p>
                          <h5>
                            <a href="{{url('register')}}"class="mt-2  register-link">Create Acount<i class="fas fa-chevron-right ml-1"></i></a>
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
                        <h4 class="mr-2 bg-blue pt-1 pb-1 pl-2 pr-2 rounded-circle">4</h4>
                        <div class="media-body">
                          <h2 class="mt-1">Choose your driver</h2>
                          <p>
                            Contact and negotiate with drivers who have the same destination you want to go to                    
                          </p>
                          <h5>
                            <a href="{{url('register')}}"class="mt-2  register-link">Create Acount<i class="fas fa-chevron-right ml-1"></i></a>
                          </h5>
                        </div>
                    </div>
                </div>
                
            </div>


        </div>
    </div>

{{-- End Page Comment Ca Marche --}}
@endsection