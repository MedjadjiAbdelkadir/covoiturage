<?php

namespace App\Http\Controllers\Reservation;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller{

    public function create($post_id){
        $post = Post::find($post_id) ;
        if(!$post){
            return redirect()->back()->with(['error'=>'This Post Not Fond']) ;
        }
        $user = Auth::user() ;
        if(!$user){
            return redirect('login');
        }

        //
        return view('Reservation.create')->with(['title'=>'Add Réservation' ,'post'=>$post]) ;



    } // End create Function
    public function postReservation(Request $request ,$post_id){
        $rules= [
            'nbr_place_res'       => 'required'
        ];

        $validatedData = $request->validate($rules) ;
        $user = Auth::user() ;

        if(!$user){
            return redirect('/login');
        }
        $post = Post::find($post_id);


        if(!$post){

            return redirect()->back()->with(['error'=>'Sorry, This Annonce does not exist']);
        }
        $nbr=   $request->nbr_place_res ;


//        confirmeReservation
        return view('Reservation.confirmeReservation',compact('nbr' ,))->with(['title'=>'Confime Reservation','post'=>$post]) ;

    } // End postReservation Function

    public function confirmReservation(Request  $request){

        $post = Post::find($request->post_id) ;

        if(!$post){
            return redirect()->back()->with(['error'=>'Sorry,This Annonce Not Found !']);
        }

        $reservation = new Reservation() ;

        $reservation->id_driver = $post->user_id ;
        $reservation->id_post   = $post->id ;
        $reservation->nbr_place_res   = $request->nbr_res ;
        $reservation->id_passager = Auth::id() ;
        $reservation->save();  // Save a Data in DataBase
        if($reservation->save()){
            $post->nbr_place = $post->nbr_place- $request->nbr_res ;
            $post->save() ;
            return redirect('/posts')->with(['success'=>'Good ,Your reservation has been successful']);

        }
        return redirect()->back()->with(['error'=>'Sorry,Confirmation failed, please try again']);

    }
    public function MesReservation(){
        // Route => profile/my-reservation
        $user_id = Auth::id() ;

        $myReservations = DB::table('reservations')
         ->join('posts' ,'posts.id', '=','reservations.id_post')
         ->join('users' , 'users.id', '=' ,'reservations.id_passager')
         ->select(
             'posts.state_départ','posts.municipal_départ','posts.state_arrivé','posts.municipal_arrive',
             'posts.date_départ','posts.time_départ','posts.prix',
             'users.full_name','users.telphone',
             'reservations.*'
         )->where('reservations.id_passager' ,$user_id )

         ->get() ;
        return view('Reservation.mesReservation')->with(['title'=>'Mes Reservation','reservation'=>$myReservations]) ;

    } // End MesReservation Function

    public function showReservation($id_reservation)
    {
        $user_id = Auth::id();
        $reservation = Reservation::find($id_reservation);
        if (!$reservation) {
            return redirect()->back()->with(['error' => 'This Reservation Not Found !']);
        }
        $dataReservation = Reservation::select('id_post')->find($id_reservation)->get();

        $dataPost = Post::with('users')->find($reservation->id_post);


        return view('Reservation.showReservation')->with(['title' => 'Show All Details', 'data' => $dataPost]);
    } // End showReservation Function
    public function destroy(Request $request , $reservation_id){

        $reservation = Reservation::find($reservation_id) ;

        if(!$reservation) {
            return redirect()->back()->with(['error'=>'This Reservation Not Exit']) ;
        }
        $post = Post::find($reservation->id_post) ;
        $new_nbrPlace = $post->nbr_place + $reservation->nbr_place_res ;
        $post->nbr_place =  $new_nbrPlace;
        $post->save() ;
        $reservation->delete() ;
        return redirect()->back()->with(['success'=>'This Reservation Is Delete']) ;

    } // End Destroy Function

} // End ReservationController
