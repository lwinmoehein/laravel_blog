<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleStoreRequest;
use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleRepository $articleRepository,TagRepository $tagRepository)
    {
        $this->articleService=new ArticleService($articleRepository,$tagRepository);

    }

    public function index()
    {
        //
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
        return view('articles.new',['tags'=>$this->articleService->getallTags(),'article'=>$this->articleService->get(1)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreRequest $request)
    {
        //
        $validated=$request->validated();
        if($validated){
           $article=Article::create(request()->all);
           $article->save();

           redirect()->back()->with('message', 'IT WORKS!');
        }
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
