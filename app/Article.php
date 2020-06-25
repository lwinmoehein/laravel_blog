<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title', 'body','user_id'];

    function tags(){
        return $this->belongsToMany(Tag::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
