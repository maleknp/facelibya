<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin','bio','about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes(){
        return $this->hasMany('App\like');
    }

    public function images(){
        return $this->hasMany('App\images');
    }

    public function Comlikes(){
        return $this->hasMany('App\comlike');
    }

    public function interest(){
        return $this->hasMany('App\interest');
    }

    public function post(){
        return $this->hasMany('App\post');
    }
    public function comment(){
        return $this->hasMany('App\comment');
    }
    public function notice(){
        return $this->hasMany('App\notice');
    }
}
