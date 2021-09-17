<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\User\UserController ;
use App\Http\Controllers\Post\PostController ;

use App\Http\Controllers\RelationController;
use App\Http\Controllers\Reservation\ReservationController ;

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

/*------------------------------------ Start Route Admin--------------------------------*/

// Route::middleware('admin')->group(function () {

Route::group(['middleware'=>'admin','namespace'=>'Admin','prefix'=>'admin'],function(){

    Route::get('/index/{id}',[DashboardController::class,'index'])->name('admin.index');

    Route::get('/users',[DashboardController::class,'users'])->name('admin.users');
    Route::get('/show-user/{user_id}',[DashboardController::class,'showUser'])->name('admin.show.user');

    Route::get('/all-Post',[DashboardController::class,'allPosts'])->name('admin.posts');
    Route::get('/show-post/{post_id}',[DashboardController::class,'showPost'])->name('admin.show-post');
    Route::get('/destroy/post/{post_id}',[DashboardController::class,'destroyPost'])->name('admin.destroy.post') ;


    Route::get('/reservations',[DashboardController::class,'reservations'])->name('admin.reservations');
    Route::get('/show-reservation/{reservation_id}',[DashboardController::class,'showReservation'])->name('admin.show.reservation');
    Route::get('/destroy/reservation/{reservation_id}',[DashboardController::class,'destroyReservation'])->name('admin.destroy.reservation') ;

    Route::get('/destroy/user/{id}',[DashboardController::class,'destroyUser'])->name('admin.destroy.user') ;



    Route::get('/all-contact',[DashboardController::class,'getAllContact'])->name('admin.getAllContact');

    Route::get('/show-contact/{contact_id}',[DashboardController::class,'showContact'])->name('admin.show.contact');
    Route::get('/destroy-contact/{contact_id}',[DashboardController::class,'destroyContact'])->name('admin.destroy.contact') ;

    Route::get('/settings/',[DashboardController::class,'Settings'])->name('admin.Settings') ;

});
/*------------------------------------ End Route Admin--------------------------------*/

Route::namespace('Home')->group(function(){
    # Home Route
    Route::get('/index',[HomeController::class,'index'])->name('home');
    # Comment Ca Marche Route
    Route::get('/show/info/Annonce/{id}',[HomeController::class,'showMoreAnnonce'])->name('show.moreAnnonce');
});
/*------------------------------------ Start Route Contact--------------------------------*/

Route::namespace('Contact')->group(function(){
    #
    Route::post('/index/contact/store',[ContactController::class,'store'])->name('contact.store');

});
/*------------------------------------ End Route Contact--------------------------------*/

/*------------------------------------ Start Route Auth--------------------------------*/
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
    Route::get('/forgot_password',[AuthController::class,'forgotPassword'])->name('forgot_password');

});
/*------------------------------------ End Route Auth--------------------------------*/

/*------------------------------------Start Route user--------------------------------------*/
 Route::group(['namespace'=>'User','prefix'=>'user/'],function (){
    Route::get('/edit-photo/{id}',[UserController::class,'editPhotoProfile'])->name('user.editPhotoProfile');
    Route::post('/update-photo/{id}',[UserController::class,'updatePhotoProfile'])->name('user.updatePhotoProfile');

    Route::get('{id}/',[UserController::class,'index'])->name('user.index');

    Route::get('edit-password/{id}',[UserController::class,'editPassword'])->name('edit.password');
    Route::post('update-password/{id}',[UserController::class,'updatePassword'])->name('update.password');

    Route::get('edit-profile/{id}',[UserController::class,'editProfile'])->name('edit.profile');
    Route::post('update-profile/{id}',[UserController::class,'updateProfile'])->name('update.profile');

    Route::get('delete/{id}',[UserController::class,'destroy'])->name('user.destroy');


});
Route::group(['namespace'=>'User'],function (){

    Route::get('users/{username}/',[UserController::class,'showProfile'])->name('users.profile');

});
/*------------------------------------ End Route user--------------------------------------*/

/*------------------------------------Start Route post--------------------------------------*/
Route::group(['namespace'=>'Post','prefix'=>''],function (){
     Route::post('/result',[PostController::class,'resultSearch'])->name('post.resultSearch');

    // -------------------------------------------------------------
    Route::get('posts',[PostController::class,'index'])->name('post.index');



    Route::get('post/create',[PostController::class,'create'])->name('post.create');

    Route::get('post/create-step-one',[PostController::class,'createStepOne'])->name('post.create.step.one');
    Route::post('post/create-step-one',[PostController::class,'postCreateStepOne'])->name('post.create.step.one.post');

    Route::get('post/create-step-two', [PostController::class,'createStepTwo'])->name('post.create.step.two');
    Route::post('post/create-step-two',[PostController::class,'postCreateStepTwo'])->name('post.create.step.two.post');


    // -------------------------------------
    Route::get('edit/post/{post_id}',[PostController::class,'edit'])->name('post.edit');
    Route::post('update/post/{post_id}',[PostController::class,'update'])->name('post.update');


    Route::get('profile/my-post',[PostController::class,'MesPost'])->name('post.MesPost');



    Route::get('profile/my-post/show/{post_id}',[PostController::class,'show'])->name('post.show');
    Route::get('delete/post/{post_id}',[PostController::class,'destroy'])->name('post.destroy');


    Route::post('search/post/',[PostController::class,'search'])->name('search.post') ;

});
/*------------------------------------ End Route post--------------------------------------*/

/*------------------------------------ Start Route Reservation-----------------------------*/

Route::group(['namespace'=>'Reservation','prefix'=>''],function(){
    Route::get('create/reservation/{id_post}',[ReservationController::class,'create'])->name('reservation.create');

    Route::post('posts/reservation/{post_id}/',[ReservationController::class,'postReservation'])->name('post.reservation');

    Route::post('posts/confirm/reservation/',[ReservationController::class,'confirmReservation'])->name('confirm.reservation');


    Route::get('profile/my-reservation',[ReservationController::class,'MesReservation'])->name('MesReservation');
    Route::get('profile/my-reservation/show/{id}',[ReservationController::class,'showReservation'])->name('showReservation');
    Route::get('delete/reservation/{reservation_id}',[ReservationController::class,'destroy'])->name('reservation.destroy');

});
/*------------------------------------ End Route Reservation--------------------------------*/

