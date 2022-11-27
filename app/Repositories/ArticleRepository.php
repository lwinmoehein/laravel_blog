<?php

namespace App\Repositories;

use App\Article;
use Symfony\Component\HttpFoundation\Request;
use App\Tag;
class ArticleRepository
{
    public function all($tag=null)
    {
        if($tag==null){
            return Article::orderBy('created_at','desc')->with('votes')->paginate(5);
        }else{
            $tags=[$tag];
            return Article::whereHas('tags', function($q) use ($tags){
                $q->whereIn("tags.id",$tags);
            })->orderBy('created_at','desc')->with('votes')->paginate(5);
        }
    }

    public function get($article_id)
    {
        return Article::findOrFail($article_id);
    }

    public function search(Request $request){
        return Article::search($request->search)->paginate(10);
    }
}
