<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function Comlikes(){
        return $this->hasMany('App\comlike');
    }

}
