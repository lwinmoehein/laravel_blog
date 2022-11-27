<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    //
    protected  $fillable = [
        "name",
        "description"
    ];


    public  function users(){
        return $this->belongsToMany(User::class,'badge_user');
    }
}
