<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\makes ;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\offerTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PostController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        // Route => posts/
        $allPosts =  Post::with('users')->orderBy('created_at','DESC')->get() ;
       return view('Post.all',compact('allPosts'))->with(['title'=>'Post']) ;

    } // End Index Function
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // --------------------------------------------------------------------------------------------
    public function create(){
        $userId = Auth::id() ;
        if($userId) {
            // $dataPost = $request->session()->get('dataPost');
            return view('post.create.index')->with(['title'=>'Add Post|Conditions reminder']);
        }else{
            return redirect('login');
        }
    }
    public function createStepOne(Request $request){

        $userId = Auth::id() ;
        if($userId) {
            $dataPost = $request->session()->get('dataPost');
            return view('post.create.create-step-one',compact('dataPost'))->with(['title'=>'Add Post|Step One',]);
        }else{
            return redirect('login');
        }

        //  $request->session()->forget('dataPost');

        //  return view('post.create-step-one');

    }  // End createStepOne Function
    public function postCreateStepOne(Request $request){
        $validatedData = $request->validate([
            'state_départ'=>'required',
            'municipal_départ' => 'required',

            'state_arrivé' => 'required',
            'municipal_arrive' => 'required',
            'date_départ' => 'required',
            'time_départ' => 'required',
        ]);



        if(empty($request->session()->get('dataPost'))){
            $dataPost = new Post();
            $dataPost->fill($validatedData);
            $request->session()->put('dataPost', $dataPost);
        }else{
            $dataPost = $request->session()->get('dataPost');
            $dataPost->fill($validatedData);
            $request->session()->put('dataPost', $dataPost);
        }

        return redirect()->route('post.create.step.two');
    } // End postCreateStepOne Function
    public function createStepTwo(Request $request){
        $makes = makes::select('id' ,'make')->get('make') ;
        $dataPost = $request->session()->get('dataPost');

        return view('post.create.create-step-two',compact('dataPost'))->with(['title'=>'Add Post|Step Two','makes'=>$makes]);
    } // End createStepTwo Function
    public function postCreateStepTwo(Request $request){
    	$validatedData = $request->validate([
            'make_voiture'=>'',
            'model_voiture'=>'' ,
            'nbr_place'=>'required',
            'prix'=>'required',
            'animale'=>'' ,
            'smoking'=>'',
            'music'=>'',
            'climatiseur'=>'' ,

        ]);
        $validatedData['animale'] = $request->has('animale');
        $validatedData['smoking'] = $request->has('smoking');
        $validatedData['music'] = $request->has('music');
        $validatedData['climatiseur'] = $request->has('climatiseur');

        $dataPost = $request->session()->get('dataPost');
        $dataPost->make_voiture =$request->make_voiture ;
        $dataPost->model_voiture =$request->model_voiture ;
        $dataPost->nbr_place =$request->nbr_place ;
        $dataPost->prix =$request->prix ;
        $dataPost->animale =$validatedData['animale'] ;
        $dataPost->smoking =$validatedData['smoking'] ;
        $dataPost->music =$validatedData['music'] ;
        $dataPost->climatiseur =$validatedData['climatiseur'] ;



        $request->session()->put('dataPost', $dataPost);
        $userId = Auth::id() ;

        $dataPost->user_id = $userId  ;
        $dataPost->save();

        if($dataPost->save()){
            $request->session()->forget('dataPost');
            return redirect('posts')->with(['success'=>'Successfully Add Post']) ;

        }else{
            return redirect()->back()->with(['Error'=>'Error Add Post']) ;
        }

    }
    // --------------------------------------------------------------------------------------------

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        // Route => show/post/{id}
        $post = Post::find($id) ;
        if(!$post){
         return redirect()->back() ;
        }
        $post = Post::select()->find($id) ;

         return view('Post.showPost')->with(['title'=>'Show All Details Post','data'=>$post]) ;
    } // End Show Function

    public function MesPost(){
        // Route => profile/my-post
        $user = Auth::user() ;
        $userId = $user->id ;

        $post = Post::select()->where('user_id',$userId)->get() ;
        return view('Post.mesPost')->with(['title'=>'Mes Post', 'post'=>$post]) ;
    } // End MesPost Function

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id){
       // Route => edit/post/{id}
       $post = Post::find($post_id) ;
       if(!$post){
        return redirect()->back() ;
       }
       $post = Post::select()->where('id',$post_id)->get() ;

       $makes = makes::select('id' ,'make')->get('make') ;

        return view('Post.Edit.edit-post')->with(['title'=>'Edit Post','post'=>$post ,'makes'=>$makes]) ;
    }  // End Edit Function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id){
        // Route => show/post/{id}

        //check if offer exist
        $post = Post::find($post_id) ;

        if(!$post){
            return redirect()->back() ;
        }
        //update Dta
        $post->update([
            'state_départ'     =>$request->state_départ ,
            'municipal_départ' =>$request->municipal_départ ,

            'state_arrivé'     => $request->state_arrivé ,
            'municipal_arrive' => $request->municipal_arrive ,
            'date_départ'      => $request->date_départ ,
            'time_départ'      => $request->time_départ ,

            'make_voiture'     =>$request->make_voiture ,
            'model_voiture'    =>$request->model_voiture ,
            'nbr_place'        =>$request->nbr_place ,
            'prix'             =>$request->prix ,

            'animale'          => $request->has('animale') ,
            'smoking'          => $request->has('smoking'),
            'music'            => $request->has('music'),
            'climatiseur'      => $request->has('climatiseur'),
        ]);

        return redirect('profile/my-post')->with(['success'=>'Update This post']);
    } // End Update Function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id){
        // Route => post/destroy/id
        $post = Post::find($post_id) ;

        if(!$post){
            return redirect()->back()->with(['error'=>'The Annonce Not Exit']) ;
        }

        $reservation = Reservation::select()->where('id_post',$post_id ) ;
        $reservation->delete() ;
        $post->delete() ;
        return redirect()->back()->with(['success'=>'The Annonces Is Delete']) ;
    } // End destroy Function



    public function resultSearch(Request $request){
        // dd($request) ;

     //   dd($request) ;

        $state_départ = $request->state_départ ;
        $state_arrivé = $request->state_arrivé ;
       $date_départ  = $request->date_départ ;

       //allPosts =Post::with('users') ;
        // $prix =2000;
        $allPosts =Post::with('users')
        ->where('state_départ', 'LIKE', '%'.$state_départ.'%')
        ->where('state_arrivé', 'LIKE', '%'.$state_arrivé.'%')
            // ->where('date_départ', 'LIKE', '%'.$date_départ.'%')
        // ->orWhere('email', 'LIKE', '%'.$search.'%')
        ->get();
       return view('Home.resultSearch')->with(['title'=>'Result','allPosts'=>$allPosts]) ;


    } // End Search Function
} // End PostController
