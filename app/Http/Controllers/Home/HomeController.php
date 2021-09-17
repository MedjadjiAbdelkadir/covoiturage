<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $allPosts =  Post::with('users')->orderBy('created_at','DESC')->limit(6)->get() ;
//        return view('Post.all',compact('allPosts'))->with(['title'=>'Post']) ;

        return view('Home.home',compact('allPosts'))->with(['title' => 'Home']) ;
    } // End Index Function

    public function showMoreAnnonce($id){

//        $post = Post::with('users')->where('id',$post_id)->get() ;
        $dataPost = Post::with('users')->find($id);

        return view('Home.show-moreAnnonce')->with(['title'=>'Show More Information', 'posts'=>$dataPost] ) ;
    }
} // End HomeController
