<?php

namespace App\Repositories;

use App\Question;
use Symfony\Component\HttpFoundation\Request;
use App\Tag;
class ArticleRepository
{
    public function all($tag=null)
    {
        if($tag==null){
            return Question::orderBy('created_at','desc')->with('votes')->paginate(5);
        }else{
            $tags=[$tag];
            return Question::whereHas('tags', function($q) use ($tags){
                $q->whereIn("tags.id",$tags);
            })->orderBy('created_at','desc')->with('votes')->paginate(5);
        }
    }

    public function get($article_id)
    {
        return Question::findOrFail($article_id);
    }

    public function search(Request $request){
        return Question::search($request->search)->paginate(10);
    }
}
