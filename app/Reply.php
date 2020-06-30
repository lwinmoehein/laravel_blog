<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = ['body', 'article_id','user_id'];

    public function article(){
       return $this->belongsTo(Article::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany('App\Reply', 'parent_id');
    }


}
