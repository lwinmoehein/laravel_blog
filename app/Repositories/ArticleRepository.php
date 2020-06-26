<?php

namespace App\Repositories;

use App\Article;

class ArticleRepository
{
    public function all()
    {
        return Article::paginate(5);
    }

    public function getArticle($article_id)
    {
        return Article::find($article_id);
    }
}
