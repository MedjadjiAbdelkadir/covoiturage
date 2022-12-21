<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;



    protected $fillable = [
        'state_départ','municipal_départ' ,'state_arrivé' ,'municipal_arrive' ,'date_départ' ,'time_départ' ,
        'make_voiture','model_voiture' ,'nbr_place','prix',
        'animale' ,'smoking','music','climatiseur','photo_voiture'
   ];
   protected $hidden = [
    'user_id',
];



    #################### Start Relation #################

    // N Post => 1 User
    # Post Model
    public function users(){
        return $this->belongsTo('App\Models\User' ,'user_id') ;
    }

    ##################

    // 1 Post => N Reservation
    # Post Model

    public function reservations(){
         return $this->hasMany('App\Models\Reservation' ,'id_post' , 'post_id') ;

    }

}
