<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function user(){
        return $this->belongsTo("App\User");
    }

    public function lop(){
        return $this->belongsTo("App\Lop");
    }
}
