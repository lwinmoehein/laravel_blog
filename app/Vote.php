<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    protected  $fillable = [
        "voter_id",
        "article_id",
        "value"
    ];

    protected  $dates = [
        "created_at"
    ];

    function user(){
        return $this->belongsTo(User::class,"voter_id");
    }
    function article(){
        return $this->belongsTo(Article::class);
    }
}
