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

    public function __construct(ArticleRepository $articleRepository,TagRepository $tagRepository)
    {
        $this->articleService=new ArticleService($articleRepository,$tagRepository);
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //

        $user=Auth::user();

        $articles=$this->articleService->getAll();

        return view('articles.index',compact(['articles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.new',['tags'=>$this->articleService->getallTags()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreRequest $request)
    {
           $article=$this->articleService->store($request);
           return redirect('/')->with('message', 'New Article Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article=$this->articleService->get($id);
        return view('articles.detail',['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleStoreRequest $request, $id)
    {
        //
         $this->articleService->update($request,$id);
         return redirect('/')->with("message","article updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       if(Auth::user()->can('delete',$this->articleService->get($id)))
       if($this->articleService->delete($id)){
           return redirect()->back()->with('message','Article Deleted');
       }
       return redirect()->back()->with('message','not allowed to delete this article');

    }
}
