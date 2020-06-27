<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Reply;
use App\Http\Requests\ArticleStoreRequest;
use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use App\Services\ArticleService;
use Illuminate\Support\Facades\Auth;
class ArticleController extends Controller
{
    protected $articleService;
    protected $articleRepository;

    //constructor
    //args (article repo,tag repo)
    public function __construct(ArticleRepository $articleRepository,TagRepository $tagRepository)
    {
        $this->articleService=new ArticleService($articleRepository,$tagRepository);
        $this->articleRepository=$articleRepository;
        $this->middleware('auth');
    }

    //get all paginated articles
    public function index(Request $request)
    {
        $articles=$this->articleRepository->all();
        return view('articles.index',compact(['articles']));
    }

    //get one article
    public function show($id)
    {
        //
        $article=$this->articleRepository->getArticle($id);
        return view('articles.detail',['article'=>$article]);
    }

    //store an article
    public function store(ArticleStoreRequest $request)
    {
        //
        $article=$this->articleService->store($request);
        return redirect('/')->with('message', 'New Article Added!');
    }
    //create new article (view)
    public function create()
    {
        //
        return view('articles.new',['tags'=>$this->articleService->getallTags()]);

    }

    //edit an article (view)
    public function edit($id)
    {
        //
        $user=Auth::user();
        $article=Article::find($id);
        if($user->can('update',$this->articleService->get($id))){
            $tags=$this->articleService->getallTags();
            $article=$this->articleService->get($id);
            return view('articles.new',compact('tags','article'));
        }else{
            return redirect()->back()->with('message','you can only update your own post');
        }

    }

    //update article data
    public function update(ArticleStoreRequest $request, $id)
    {
        //
         $this->articleService->update($request,$id);
         return redirect('/')->with("message","article updated");

    }

    //delete an article
    public function destroy($id)
    {
        //
       if(Auth::user()->can('delete',$this->articleService->get($id)))
       if($this->articleService->delete($id)){
           return redirect('/')->with('message','Article Deleted');
       }
       return redirect()->back()->with('message','not allowed to delete this article');

    }
}
