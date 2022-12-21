<?php

namespace App\Models;

use Avatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'telphone',
        'password',
        'Birthday',
        'sexe',
        'avatar' ,
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'password',
        'remember_token',
    ];




    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //  public function getAvatarAttribute($value)
    // {
    //     if($value == null){
    //         return "https://res.cloudinary.com/dtvc2pr8i/image/upload/w_150,f_auto/v1627577895/myballot/users/user_znc23a.png";
    //     }
    //     return $value;
    // }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }


    #################### Start Relation #################
    //One To One :
    public function phone(){
      // One User => One Phone
      return  $this->hasOne('App\Models\Phone' ,'user_id') ;
    }


    // 1 User => N Posts
    # User Model
    public function posts(){
        return $this->hasMany('App\Models\Post' ,'user_id' , 'id') ;
    }


    ##############################################################
    // 1 User => N Reservation
    # User Model
    public function reservations(){
        return $this->hasMany('App\Models\Reservation' ,'id_passager' , 'id') ;
     }
    #################### End Relation ###################
}
