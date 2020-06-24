<?php
namespace App\Services;
use App\Article;
use App\Repositories\ArticleRepository;

class ArticleService
{
    protected $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository=$repository;
    }
    public  function getAll(){
        return $this->repository->all();
    }

    public function get($id){
        return $this->repository->getArticle($id);
    }

    public  function delete($id){
        return Article::destroy($id);
    }

    public function store($article){
        return $article->save();
    }

    public function update($article){
        Article::where('id',$article->id)->update($article);
    }




}
