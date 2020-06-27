<?php
namespace App\Services;
use App\Article;
use App\Repositories\ArticleRepository;
use App\Http\Requests\ArticleStoreRequest;

class ArticleService
{
    protected $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository=$repository;
    }

    public  function delete($id){
        return Article::destroy($id);
    }

    public function store(ArticleStoreRequest $request){
        $article= new Article($request->validated());
        $article->fill(['user_id'=>auth()->id()])->save();
        $article->tags()->attach($request['tags']);
        return $article;
    }

    public function update(ArticleStoreRequest $request,$id){
         $article= Article::find($id);
         $article->update($request->only(['title','body']));
         return $article->tags()->sync($request['tags']);

    }

}
