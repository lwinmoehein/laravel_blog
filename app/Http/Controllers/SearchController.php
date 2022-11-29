<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Question;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
class SearchController extends Controller
{
    protected $articleRepository;

    public function __construct(QuestionRepository $articleRepository)
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
        return view('questions.search',compact('articles'));
    }

}
