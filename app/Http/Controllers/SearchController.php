<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
class SearchController extends Controller
{
    public function userList(Request $request)
    {

        if($request->has('search')){
            $articles = Article::search($request->search)
                ->paginate(6);
        }else{
            $articles = null;
        }
        return view('articles.search',compact('articles'));
    }

}
