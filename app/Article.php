<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    //
    use Searchable;


    protected $fillable = ['title', 'body','user_id'];

    function tags(){
        return $this->belongsToMany(Tag::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    //scout
    public function searchableAs()
    {
        return 'articles_index';
    }
}
