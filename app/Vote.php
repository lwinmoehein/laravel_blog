<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    protected  $fillable = [
        "voter_id",
        "article_id"
    ];

    protected  $dates = [
        "created_at"
    ];
}
