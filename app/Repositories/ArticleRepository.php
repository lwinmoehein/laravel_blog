<?php

namespace App\Repositories;

use App\Article;
use Symfony\Component\HttpFoundation\Request;

class ArticleRepository
{
    public function all()
    {
        return Article::paginate(5);
    }

    public function get($article_id)
    {
        return Article::findOrFail($article_id);
    }

    public function search(Request $request){
        return Article::search($request->search)->paginate(10);
    }
}
