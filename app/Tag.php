<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = [
        "name"
    ];
    function articles(){
        return $this->belongsToMany(Article::class);
    }
}
