<?php
namespace App\Services;
use App\Article;
use App\User;
use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use App\Http\Requests\ArticleStoreRequest;
use Illuminate\Support\Facades\Auth;

class ArticleService
{
    protected $repository;
    protected $tagRepository;

    public function __construct(ArticleRepository $repository,TagRepository $tagRepository)
    {
        $this->repository=$repository;
        $this->tagRepository=$tagRepository;
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

    public function getAllTags(){
        return $this->tagRepository->all();
    }




}
