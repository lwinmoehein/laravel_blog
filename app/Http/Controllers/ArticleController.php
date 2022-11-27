<?php

namespace App\Http\Controllers;

use App\Article;
use App\Repositories\AchievementRepository;
use App\Services\AchievementService;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;

use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;

use App\Services\ArticleService;

use Illuminate\Support\Facades\Auth;
class ArticleController extends Controller
{
    protected $articleService;
    protected $articleRepository;
    protected $tagRepository;
    protected $userRepository;
    protected $achievementService;
    protected $achievementRepository;

    //constructor
    //args (article repo,tag repo)
    public function __construct(
        ArticleRepository $articleRepository,
        TagRepository $tagRepository,
        UserRepository $userRepository,
        AchievementService $achievementService,
        AchievementRepository $achievementRepository
    )
    {
        $this->articleService=new ArticleService(
            $articleRepository,
            $achievementRepository,
            $achievementService
        );

        $this->userRepository=$userRepository;
        $this->articleRepository=$articleRepository;
        $this->tagRepository=$tagRepository;

        $this->middleware('auth');
    }

    //get all paginated articles
    public function index(Request $request)
    {
        $articles=$this->articleRepository->all($request->tag);
        $tags = $this->tagRepository->all();
        return view('articles.index',compact(['articles','tags']));
    }

    //get one article
    public function show($id)
    {
        //
        $article=$this->articleRepository->get($id);
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

        if (auth()->user()->can('store', Article::class)) {
            return view('articles.new',['tags'=>$this->tagRepository->all()]);
        }
        return redirect()->back()->withErrors("မေးခွန်းများမေးနိုင်ရန် email address အား verify လုပ်ပေးပါ။");

    }

    //edit an article (view)
    public function edit($id)
    {

        $article=$this->articleRepository->get($id);

        if (auth()->user()->can('modify', $article)) {
            $tags=$this->tagRepository->all();
            $article=$this->articleRepository->get($id);
            return view('articles.new',compact('tags','article'));
        }

        return redirect()->back()->withErrors('မေးခွန်းအားပြင်ခွင့်မရှိပါ။');

    }

    //update article data
    public function update(ArticleStoreRequest $request, $id)
    {
        //
        $article = $this->articleRepository->get($id);

        if (auth()->user()->can('modify', $article)) {
            $this->articleService->update($request,$id);
            return redirect()->back()->with('message','မေးခွန်းအားပြင်လိုက်ပါပြီ။');
        }

        return redirect()->back()->withErrors("ပြင်ခွင့်မရှိပါ။");

    }

    //delete an article
    public function destroy($id)
    {
        $article = $this->articleRepository->get($id);

        if (auth()->user()->can('modify', $article)) {
            $this->articleService->delete($id);
            return redirect()->route('articles.index')->with('message','မေးခွန်းအားဖျက်လိုက်ပါပြီ။');
        }

         return redirect()->back()->withErrors("ဖျက်ခွင့်မရှိပါ။");

    }
}
