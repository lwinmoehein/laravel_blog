<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = ['body', 'question_id','user_id','parent_id'];

    public function question(){
       return $this->belongsTo(Question::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany('App\Answer', 'parent_id');
    }
    public function parent(){
        return $this->belongsTo('App\Answer','parent_id');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }


}