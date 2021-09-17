<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_post','id_driver' ,'id_passager','nbr_place_res',
        'created_at','updated_at',
   ];



    // N Reservation => 1 passengers
    # Reservation Model
    public function passengers(){
        return $this->belongsTo('App\Models\User' ,'id_passager' ,'id') ;
    }


    public function users(){
        return $this->belongsTo('App\Models\User' ,'id_driver') ;
    }
    // N Reservation => 1 User
    # Reservation Model
    public function drivers(){
        return $this->belongsTo('App\Models\User' ,'id_driver' , 'id') ;
    }
    ###############
    // 1 Post => N Reservation
    # Reservation Model

    public function posts(){
        return $this->belongsTo('App\Models\Post' ,'id_post' , 'id') ;

    }



}
