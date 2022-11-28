<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Question;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
class SearchController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository=$articleRepository;
    }
    public function userList(Request $request)
    {

        if($request->has('search')){
            $articles = $this->articleRepository->search($request);

        }else{
            $articles = null;
        }
        return view('articles.search',compact('articles'));
    }

}
