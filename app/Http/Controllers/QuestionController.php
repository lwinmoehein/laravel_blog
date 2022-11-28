<?php

namespace App\Http\Controllers;

use App\Question;
use App\Repositories\AchievementRepository;
use App\Services\AchievementService;
use App\Services\VoteService;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;

use App\Repositories\ArticleRepository;
use App\Repositories\TagRepository;
use App\Repositories\UserRepository;

use App\Services\QuestionService;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    protected $questionService;
    protected $questionRepository;
    protected $tagRepository;
    protected $userRepository;
    protected $achievementService;
    protected $achievementRepository;
    protected $voteService;
    //constructor
    //args (article repo,tag repo)
    public function __construct(
        ArticleRepository     $questionRepository,
        TagRepository         $tagRepository,
        UserRepository        $userRepository,
        AchievementService    $achievementService,
        AchievementRepository $achievementRepository,
        VoteService           $voteService
    )
    {
        $this->questionService=new QuestionService(
            $questionRepository,
            $achievementRepository,
            $achievementService
        );

        $this->userRepository=$userRepository;
        $this->questionRepository=$questionRepository;
        $this->tagRepository=$tagRepository;
        $this->voteService = $voteService;

        $this->middleware('auth');
    }

    //get all paginated questions
    public function index(Request $request)
    {
        $questions=$this->questionRepository->all($request->tag);
        $tags = $this->tagRepository->all();
        return view('questions.index',compact(['questions','tags']));
    }

    //get one article
    public function show($id)
    {
        //
        $article=$this->questionRepository->get($id);
        return view('questions.detail',['article'=>$article]);
    }

    //store an article
    public function store(ArticleStoreRequest $request)
    {
        //
        $article=$this->questionService->store($request);
        return redirect('/')->with('message', 'New Question Added!');
    }
    //create new article (view)
    public function create()
    {
        //

        if (auth()->user()->can('store', Question::class)) {
            return view('questions.new',['tags'=>$this->tagRepository->all()]);
        }
        return redirect()->back()->withErrors("မေးခွန်းများမေးနိုင်ရန် email address အား verify လုပ်ပေးပါ။");

    }

    //edit an article (view)
    public function edit($id)
    {

        $article=$this->questionRepository->get($id);

        if (auth()->user()->can('modify', $article)) {
            $tags=$this->tagRepository->all();
            $article=$this->questionRepository->get($id);
            return view('questions.new',compact('tags','article'));
        }

        return redirect()->back()->withErrors('မေးခွန်းအားပြင်ခွင့်မရှိပါ။');

    }

    //update article data
    public function update(ArticleStoreRequest $request, $id)
    {
        //
        $article = $this->questionRepository->get($id);

        if (auth()->user()->can('modify', $article)) {
            $this->questionService->update($request,$id);
            return redirect()->back()->with('message','မေးခွန်းအားပြင်လိုက်ပါပြီ။');
        }

        return redirect()->back()->withErrors("ပြင်ခွင့်မရှိပါ။");

    }

    //delete an article
    public function destroy($id)
    {
        $article = $this->questionRepository->get($id);

        if (auth()->user()->can('modify', $article)) {
            $this->questionService->delete($id);
            return redirect()->route('questions.index')->with('message','မေးခွန်းအားဖျက်လိုက်ပါပြီ။');
        }

         return redirect()->back()->withErrors("ဖျက်ခွင့်မရှိပါ။");
    }

    public function vote(Request $request){
        $isVoteSuccess = false;
        $message = "";

        $article = Question::where('id',$request->article_id)->get()->first();

        if(Gate::inspect('vote', Question::class)->denied()){
            return  redirect()->back()->withErrors("Vote ပေးနိုင်ခွင့်မရှိပါ။");
        }


        if($request->vote_type==1){
            $response = Gate::inspect('upVote',$article);
            if ($response->allowed()) {
                $isUpvoted = $this->voteService->upvote($request->article_id);
                $message = "Upvoted the article.";
                $isVoteSuccess = $isUpvoted;
            } else {
                $message = $response->message();
            }
        }else if($request->vote_type==0){
            $response = Gate::inspect('upVote', $article);
            if ($response->allowed()) {
                $isUpvoteRemoved = $this->voteService->removeUpVote($request->article_id);
                $message = "Upvoted removed.";
                $isVoteSuccess = $isUpvoteRemoved;
            } else {
                $message = $response->message();
            }
        }else if($request->vote_type==-1){
            $response = Gate::inspect('downVote', $article);
            if ($response->allowed()) {
                $isDownVoted = $this->voteService->downVote($request->article_id);
                $message = "Downvoted the article.";
                $isVoteSuccess = $isDownVoted;
            } else {
                $message = $response->message();
            }
        }else{
            $response = Gate::inspect('downVote', $article);
            if ($response->allowed()) {
                $isDownVoteRemoved = $this->voteService->removeDownVote($request->article_id);
                $message = "Removed the downvote.";
                $isVoteSuccess = $isDownVoteRemoved;
            } else {
                $message = $response->message();
            }
        }
        if(!$isVoteSuccess) {
            return redirect()->back()->withErrors($message);
        }
        return redirect()->back()->with('message',$message);
    }
}