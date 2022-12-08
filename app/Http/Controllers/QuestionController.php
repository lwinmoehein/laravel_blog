<?php

namespace App\Http\Controllers;

use App\Badge;
use App\Events\Illuminate\Auth\Events\BadgeReceived;
use App\Events\Illuminate\Auth\Events\NewNotificationCreated;
use App\Notifications\GotNewAchievement;
use App\Notifications\GotNewBadge;
use App\Question;
use App\Repositories\AchievementRepository;
use App\Services\AchievementService;
use App\Services\VoteService;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionStoreRequest;
use App\Achievement;
use App\Repositories\QuestionRepository;
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
        QuestionRepository    $questionRepository,
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
        $firstNotification = auth()->user()->notifications()->first();

        if($firstNotification)
            event(new NewNotificationCreated(auth()->user()->notifications()->first()));

        $questions=$this->questionRepository->all($request->tag);
        $tags = $this->tagRepository->all();

        return view('questions.index',compact(['questions','tags']));
    }

    //get one article
    public function show(Question $question)
    {
        //
        $question=$this->questionRepository->get($question->id);
        return view('questions.detail',['question'=>$question]);
    }

    //store an article
    public function store(QuestionStoreRequest $request)
    {
        //
        $question=$this->questionService->store($request);

        if(!$question)
            return  redirect('/')->withErrors('မေးခွန်းမေးခြင်း မအောင်မြင်ပါ။');
        return redirect('/')->with('message', 'မေးခွန်းအသစ်မေးလိုက်ပါပြီ။');
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

        $question=$this->questionRepository->get($id);

        if (auth()->user()->can('modify', $question)) {
            $tags=$this->tagRepository->all();
            $question=$this->questionRepository->get($id);
            return view('questions.new',compact('tags','question'));
        }

        return redirect()->back()->withErrors('မေးခွန်းအားပြင်ခွင့်မရှိပါ။');

    }

    //update article data
    public function update(QuestionStoreRequest $request, $id)
    {
        //
        $question = $this->questionRepository->get($id);

        if (auth()->user()->can('modify', $question)) {
            $this->questionService->update($request,$id);
            return redirect()->back()->with('message','မေးခွန်းအားပြင်လိုက်ပါပြီ။');
        }

        return redirect()->back()->withErrors("ပြင်ခွင့်မရှိပါ။");

    }

    //delete an article
    public function destroy($id)
    {
        $question = $this->questionRepository->get($id);

        if (auth()->user()->can('modify', $question)) {
            $this->questionService->delete($id);
            return redirect()->route('questions.index')->with('message','မေးခွန်းအားဖျက်လိုက်ပါပြီ။');
        }

         return redirect()->back()->withErrors("ဖျက်ခွင့်မရှိပါ။");
    }

    public function vote(Request $request){
        $isVoteSuccess = false;
        $message = "";

        $question = Question::where('id',$request->question_id)->get()->first();

        if(Gate::inspect('vote', Question::class)->denied()){
            return  redirect()->back()->withErrors("Vote ပေးနိုင်ခွင့်မရှိပါ။");
        }


        if($request->vote_type==1){
            $response = Gate::inspect('upVote',$question);
            if ($response->allowed()) {
                $isUpvoted = $this->voteService->upvote($request->question_id);
                $message = "Upvoted the article.";
                $isVoteSuccess = $isUpvoted;
            } else {
                $message = $response->message();
            }
        }else if($request->vote_type==0){
            $response = Gate::inspect('upVote', $question);
            if ($response->allowed()) {
                $isUpvoteRemoved = $this->voteService->removeUpVote($request->question_id);
                $message = "Upvoted removed.";
                $isVoteSuccess = $isUpvoteRemoved;
            } else {
                $message = $response->message();
            }
        }else if($request->vote_type==-1){
            $response = Gate::inspect('downVote', $question);
            if ($response->allowed()) {
                $isDownVoted = $this->voteService->downVote($request->question_id);
                $message = "Downvoted the article.";
                $isVoteSuccess = $isDownVoted;
            } else {
                $message = $response->message();
            }
        }else{
            $response = Gate::inspect('downVote', $question);
            if ($response->allowed()) {
                $isDownVoteRemoved = $this->voteService->removeDownVote($request->question_id);
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
