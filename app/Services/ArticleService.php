<?php
namespace App\Services;
use App\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;

class ArticleService
{
    protected $repository;
    protected $tagRepository;

    public function __construct(ArticleRepository $repository,TagRepository $tagRepository)
    {
        $this->repository=$repository;
        $this->tagRepository=$tagRepository;
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

    public function getAllTags(){
        return $this->tagRepository->all();
    }




}
