<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    // ---------------- Register  ---------------- //
    public function register(){
        return view('Auth.register',['title' => 'Sign up','class'=>'register','title_form'=>'Create Acount']);
    }
    // ---------------- Post Register  ---------------- //
    public function postRegister(Request $re){
        $rules= [
            'full_name' => 'required|min:15',
            'email'      =>'required|email',
            'telphone'   =>'required',
            'password'        =>'required',
            'birthday'   =>'required',
            'sexe'       =>'required'            
        ];
        $val = $re->validate($rules) ;

        // Saving Tout les Donnees In Database

        $user = new User() ;
        $user->full_name  = $re->full_name ;
        $user->email       = $re->email ;
        $user->telphone         = $re->telphone ;
        $user->password    = Hash::make($re->password);
        $user->birthday    = $re->birthday ;
        $user->sexe        = $re->sexe ;

        $user->save() ;  

        return redirect('home',['title' => 'Home']);
    }
    // ---------------- Login  ---------------- //
    public function login(){
        return view('Auth.login',['title' => 'Sign in', 'class'=>'login','title_form'=>'Login']);
    }
    // ---------------- Post Login  ---------------- //
    public function postLogin(Request $re){
        $val = $re->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]) ;
        $r = $re->only("email","password");
        
        if(Auth::attempt($r)){
            return redirect('index');
        }else{
            return redirect('login');
        }
    }
    // ---------------- Logout  ---------------- //
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    
}
