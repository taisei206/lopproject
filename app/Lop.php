<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    //
    protected $fillable=[
        "dream","dreamwhy","dreamdo","nowdo","nowwhy","tovisitor"
    ];

    public function user(){
        return $this->belongsTo("App\User");
    }
}
