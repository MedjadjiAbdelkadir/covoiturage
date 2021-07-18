<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Front\PostController ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::namespace('Front')->group(function(){
    # Home 
    Route::get('/index',[HomeController::class,'index'])->name('home');

    # Post
    // Route::resource('/post/index',PostController::class);

});
Route::namespace('Auth')->group(function (){

    # Register
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/postRegister',[AuthController::class,'postRegister'])->name('postRegister');

    # Login
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/postLogin',[AuthController::class,'postLogin'])->name('postLogin');
    # Logout
    Route::get('/logout',[AuthController::class, 'logout']);

    # Forgot Password
    Route::get('/forgot_password', function () {

        return view('Auth.forgotpassword',['title'=>'Forgot Password','class'=>'login']) ;
    })->name('forgot_password');
    
});

// Route::namespace('User')->group(function (){


// });
Route::group(['middleware'=>'auth','namespace'=>'User'], function(){
    // Route::get('/', function () {
    //     return 'Yes Abdelkadir' ;
    // });
//    Route::resource('/user', UserController::class);
// Route::get('/index',[UserController::class, 'index']);

});
Route::resource('user', UserController::class)->middleware('auth');
