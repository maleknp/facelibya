<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
