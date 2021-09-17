<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\offerTrait;

use App\Http\Requests\UserRequest;
use App\Models\Offer;
use App\Models\User;
use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    use offerTrait;
    public function index(Request $request){
        // return view('User.Edit.main')->with(['title'=>'Profile']) ;
        $user = User::find(Auth::user()->id);

        // dd(Auth::user()) ;
        $users = $request->session()->put('users' , $user ) ; // Add data of user in Session

        // $data = DB::table('role_user')

        // ->join('users' ,'users.id', '=','role_user.user_id')

        // ->join('roles' , 'roles.id', '=' ,'role_user.role_id')

        // ->select('roles.name')
        // ->where('user_id',Auth::user()->id)
        // ->get() ;

        // dd($data ) ;
        return view('User.index')->with(['title'=>'Profile' ,'users' =>$users ]) ;
    } // End index Function

    public function editProfile(Request $request,$id){
        // route =>    /user/edit-profile/id
        $user = Auth::user() ;

        // $user = User::find(Auth::user()->id);

        $users = $request->session()->put('users' , $user) ; // Add data of user in Session
        if($id = $user->id ){
            return view('User.Edit.profile')->with(['title'=>'Profile |Edit Profile','users'=>$users]) ;
        }
         return redirect()->back() ;

    }  // End editProfile Function

    public function editPassword(Request $request ,$id){
        // route =>    /user/edit-password/id
        $user = Auth::user() ;
        $user_id  = $user->id ;

        $users = $request->session()->put('users' , $user) ; // Add data of user in Session
        if($user_id = $id ){
            return view('User.Edit.password')->with(['title'=>'Profile |Edit Password','users'=>$users]) ;
        }
    }  // End editPassword Function
    public function updatePassword(Request $request ,$id){
        // dd($request) ;
        $validated = $request->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|same:password_confirmation|min:8|max:25',
            'password_confirmation' => 'required|min:8|max:25',
        ]);


       $hashedPassword = Auth::user()->password; // $2y$10$q5duUCMUu.UDuUeGh3VXRe1lzkAuSWxVuCPV9hREBez27dX.mj3V
       //    dd($hashedPassword) ;
       if(Hash::check($request->old_password , $hashedPassword)){
          //    if Old Password = Password in DataBase
            if (Hash::check($request->new_password , $hashedPassword)){
                // if New Password = Password in DataBase
                return redirect()->back()->with(['error'=>'New assword Can not be the old password!']);
            }else{
                // if New Password != Password in DataBase
                $user = User::find(Auth::user()->id);
                $user->password = Hash::make($request->new_password) ;  // Hash New Password

                $user->save() ;  // Save a New Password
                $users = $request->session()->put('users' , $user) ; // Add New Update in Session
                return redirect()->back()->with(['success'=>'Password Updated Successfully','user'=>$users]);
            }
       } else{
         //    if Old Password != Password in DataBase
          return redirect()->back()->with(['error'=>'Old password doesnt matched']);
       }

    }  // End updatePassword Function

    public function updateProfile(Request $request , $id){
        $validated = $request->validate([
            'full_name' => 'min:8|max:25',   // unique:users,full_name|
            'email'     => 'email|min:8|max:50',
            'telphone'  => 'numeric',
           // 'avatar'    => 'max:10048', //mimes:jpeg,png,jpg| or image|mimes:jpeg,png,jpg,gif|
        ]); //  End Rules Validation
        $user = User::find(Auth::user()->id);
            $user->full_name = $request->full_name ;
            $user->email     = $request->email ;
            $user->telphone  = $request->telphone ;
            // $user = User::find(Auth::user()->id);
            $users = $request->session()->put('users' , $user) ; // Add New Update in Session

            $user->save() ; // Save a Data in Data Base
            // $users = $request->session()->put('users' , $user) ; // Add New Update in Session
            return redirect()->back()->with(['success'=>'Profile Updated Successfully','user'=>$users]) ;

    }  // End updateProfile Function

    public function editPhotoProfile(Request $request){
        $user = Auth::user() ;
        $users = $request->session()->put('users' , $user) ; // Add data of user in Session
        return view('User.Edit.updatePhoto')->with(['title'=>'Profile |Update Photo' ,'users'=>$users]) ;
    }

    public function updatePhotoProfile(Request $request ,$id){
        $user = User::find(Auth::user()->id);

       if($request->photo == null){
        return redirect()->back()->with(['error'=>'We Must Chose Photo']) ;
       }else{
        $file_name = $this->saveImage($request -> photo, 'images/users/userProfile');
        // $user->update([
        //     'avatar' => $file_name ,
        //    ]);
        $user->avatar = $file_name ;
        $users = $request->session()->put('users' , $user) ; // Add New Update in Session
        $user->save() ;   // Save Photo

        if($user->save() ){
            return redirect()->back()->with(['success'=>'Updated Photo Profile Successfully','user'=>$users]) ;
        }
       }

    } // End function updatePhotoProfile


    public function destroy(Request $request,$id){
        $user = User::find($id) ;
        if(!$user){
           // return redirect()->back()->with(['error'=>'This User Not Fond']) ;
        }else{
            $user->delete() ;
            $request->session()->forget('users') ;
            return redirect('/login');
        }

    } // End function Destroy

}  // End UserController
