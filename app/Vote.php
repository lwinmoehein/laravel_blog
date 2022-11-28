<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    protected  $fillable = [
        "voter_id",
        "question_id",
        "value"
    ];

    protected  $dates = [
        "created_at"
    ];

    function user(){
        return $this->belongsTo(User::class,"voter_id");
    }
    function question(){
        return $this->belongsTo(Question::class);
    }
}
