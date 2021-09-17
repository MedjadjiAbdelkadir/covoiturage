<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    //

    // ---------------- Register  ---------------- //
    public function register(){
        //  session(['link' => url()->previous()]);

        return view('Auth.register',['title' => 'Sign up']);
    }
    // ---------------- Post Register  ---------------- //
    public function postRegister(Request $re){
        $rules= [
            'full_name'  => 'required|min:7|unique:users,full_name',
            'email'      => 'required|email|unique:users,email',
            'telphone'   => 'required',
            'password'   => ['required','min:8'],  //,'regex:/[a-z]/','regex:/[A-Z]/','regex:/[0-9]/'
            'birthday'   => 'required',
            'sexe'       => 'required'
        ];

        $val = $re->validate($rules) ;

        // Saving Tout les Donnees In Database

        $user = new User() ;
        $user->full_name   = $re->full_name ;
        $user->email       = $re->email ;
        $user->telphone    = $re->telphone ;
        $user->password    = Hash::make($re->password);
        $user->birthday    = $re->birthday ;
        $user->sexe        = $re->sexe ;
        $user->avatar      = '1629850836.png' ;

        $user->save() ;
        if($user->save()) {

            Auth::login($user)  ;

            $users = $re->session()->put('users' , $user) ;

            // return redirect(session('link'))->with(['title' => 'Home','success'=>'Welcome To Your New Account','user'=>$users]);

              return redirect('index')->with(['title' => 'Home','success'=>'Welcome To Your New Account','user'=>$users]);
        }

    }
    // ---------------- Login  ---------------- //
    public function login(){
        //  session(['link' => url()->previous()]);
        return view('Auth.login')->with(['title' => 'Sign in']);
    }
    // ---------------- Post Login  ---------------- //
    public function postLogin(Request $re){
        $val = $re->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]) ;
        $r = $re->only("email","password");

        if(Auth::attempt($r)){
            $user = Auth::user();

            // dd($user );
            $users = $re->session()->put('users' , $user) ;

            // return redirect(session('link'))->with(['title' => 'Home','user'=>$users]);
            // return Redirect::back() ;
            // return Redirect::back()->with(['title' => 'Home','user'=>$users]);
            // return redirect(url()->previous())->with(['title' => 'Home','user'=>$users]);

        return redirect('index')->with(['title' => 'Home','user'=>$users]);


        }else{
            return redirect('login')->with(['error'=>'Incorrect email or password ']);
        }
    }
    public function forgotPassword(){
        return view('Auth.forgotpassword',['title'=>'Forgot Password']) ;
    }
    // ---------------- Logout  ---------------- //
    public function logout(Request $re){
        Auth::logout();
        $re->session()->forget('users') ;
        $re->session()->forget('link') ;
        return redirect('/login');
    }


}
