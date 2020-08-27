<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{

    protected $fillable = ['title'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function likes(){
        return $this->hasMany('App\like');
    }
}
