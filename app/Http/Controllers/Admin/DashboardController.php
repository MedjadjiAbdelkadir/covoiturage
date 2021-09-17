<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller{

    public function index($id){

        $nbrUsers = User::select()->get()->count() ;
        $nbrPosts = Post::select()->get()->count() ;
        $nbrReservation = Reservation::select()->get()->count() ;
        $nbrMessages  =Contact::select()->get()->count() ;
        return view('Admin.index',compact('nbrUsers','nbrPosts','nbrReservation','nbrMessages'))->with(['title'=>'Admin']) ;
    }
    ############################## Start Users Function ##############################
    public function users(){
        $users = User::select()->get();
        // dd($users) ;
        return view('Admin.users')->with(['title'=>'Admin |Users', 'data'=>$users]) ;
    } // End users Function

    public function showUser($user_id){
        $user = User::find($user_id);
        if(!$user){
            return redirect()->back()->with(['error'=>'This User Not Fond']) ;
        }else{

            return view('Admin.user')->with(['title'=>'Admin |Show-User', 'user'=>$user]) ;
        }

    } // End showUser Function
    ############################## End Users Function ##############################

    ############################## Start Annonces Function ##############################
    public function allPosts(){

        $allPosts = Post::with('users')->get() ;

        return view('Admin.allPosts')->with(['title'=>'Admin |Posts', 'posts'=>$allPosts]) ;

    } // End allPosts Function
    public function showPost($post_id){

        $post = Post::with('users')->find($post_id) ;
        return view('Admin.post')->with(['title'=>'Admin |Post', 'post'=>$post]) ;

    } // End showPost Function

    public function destroyPost($post_id){
        $post = Post::find($post_id) ;


        // dd($post) ;
        if(!$post){
           return redirect()->back()->with(['error'=>'This Annonce Not Fond']) ;
        }else{
            $reservation = Reservation::select()->where('id_post',$post_id ) ;
            $reservation->delete() ;

            $post->delete() ;
            return redirect()->back()->with(['success'=>'Delete Annonce Successfully']) ;
        }

    } // End destroyUser Function

    ############################## End Annonces Function ##############################

    ############################## Start Reservation Function ##############################
    public function reservations(){
          $allReservations = Reservation::with('passengers')->with('drivers')->get() ;

        // $allPosts =  Post::with('users')->get() ;
       return view('Admin.allReservation')->with(['title'=>'Admin |All Reservation', 'reservation'=>$allReservations]) ;
    } // End reservations Function

    public function showReservation($reservation_id){

        $reservation = Reservation::with('passengers')->with('drivers')->find($reservation_id) ;
        return view('Admin.reservation')->with(['title'=>'Admin |Reservation', 'reservation'=>$reservation]) ;

        // dd($reservation) ;
    }

    public function destroyReservation($reservation_id){
        $reservation = Reservation::find($reservation_id) ;


        // dd($post) ;
        if(!$reservation){
           return redirect()->back()->with(['error'=>'This Reservation Not Fond']) ;
        }else{
            $post = Post::find($reservation->id_post) ;
            $new_nbrPlace = $post->nbr_place + $reservation->nbr_place_res ;
            $post->nbr_place =  $new_nbrPlace;
            $post->save() ;

            $reservation->delete() ;
            return redirect()->back()->with(['success'=>'Delete Reservation Successfully']) ;
        }

    } // End destroyReservation Function

    ############################## End Reservation Function ##############################

    public function destroyUser($id){
        $user = User::find($id) ;
        if(!$user){
           return redirect()->back()->with(['error'=>'This User Account Not Fond']) ;
        }else{
            $post = Post::select()->where('user_id' ,$id) ;
            $reservation = Reservation::select()->where('id_driver' ,$id) ;

            if($reservation){
                $post_res = Post::find($reservation->id_post) ;
                $post_res->nbr_place =$post_res->nbr_place + $reservation->nbr_place_res ;
                $post_res->save() ;
                $reservation->delete() ;
            }
            if($post){
                $reservation = Reservation::select()->where('id_post' ,$post->id) ;
                $reservation->delete() ;
                $post->delete() ;
            }

            $user->delete() ;
            return redirect()->back()->with(['success'=>'Delete User Account Successfully']) ;
        }
    } // End destroyUser Function



    public function getAllContact(){

        $allContacts = Contact::select()->get() ;

        return view('Admin.allContact')->with(['title'=>'Admin |Contact', 'contacts'=>$allContacts]) ;

    } // End GetContact Function

    public function showContact($contact_id){

        $contact = Contact::find($contact_id);

        return view('Admin.contact')->with(['title'=>'Admin |Show All Details', 'contact'=>$contact]) ;
    } // End showContact Function

    public function destroyContact($contact_id){
        $contact = Contact::find($contact_id);

        if(!$contact){
            return redirect()->back()->with(['error'=>'This Contact Not Fond']) ;
        }else{

            $contact->delete() ;
            return redirect()->back()->with(['success'=>'Delete Contact Successfully']) ;
        }

    } // End destroyContact Function


    #########################################################################################
    public function Settings(){
        return view('Admin.settings')->with(['title'=>'Admin |Tols',]) ;

    }
} // End DashboardController Controller
