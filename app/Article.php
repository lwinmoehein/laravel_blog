<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    //
    use Searchable;


    protected $fillable = ['title', 'body', 'user_id'];

    function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    //scout
    public function searchableAs()
    {
        return 'articles_index';
    }
    public function replies()
    {
        return $this->hasMany(Reply::class, 'article_id')->where('parent_id', '=', null);
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function getReadMoreDescriptionAttribute()
    {
        $body = $this->body;
        $max = 250;
        if (strlen($this->body) > $max)
            $body = substr($this->body, 0, $max) . '...';


        return $body;
    }
    public function votes(){
        return $this->hasMany(Vote::class);
    }
    public function getVoteCountAttribute(){
        return $this->votes->sum("value");
    }
    public function getIsUpVotedAttribute(){
        $upVotes =  Vote::where('article_id',$this->id)->where('voter_id',auth()->user()->id)->where('value',1)->get();
        return count($upVotes)>=1;
    }
    public function getIsDownVotedAttribute(){
        $downVotes =  Vote::where('article_id',$this->id)->where('voter_id',auth()->user()->id)->where('value',-1)->get();
        return count($downVotes)>=1;
    }
}
