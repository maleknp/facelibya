<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comlike extends Model
{
    public function comlike(){
        return $this->belongsTo('App\comlike');
    }

    public function comment(){
        return $this->belongsTo('App\comment');
    }

}
