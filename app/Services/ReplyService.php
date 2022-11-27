<?php
namespace App\Services;

use App\Achievement;
use App\Article;
use App\Notifications\GotNewAchievement;
use App\Reply;
use App\Http\Requests\ReplyStoreRequest;
use App\Http\Requests\ReplyUpdateRequest;
use App\Repositories\AchievementRepository;
use App\Repositories\ReplyRepository;
use Illuminate\Support\Facades\Auth;

class ReplyService
{
    protected $replyRepository;
    protected $achievementRepository;
    protected $achievementService;


    public function __construct(
        ReplyRepository       $replyRepository,
        AchievementRepository $achievementRepository,
        AchievementService    $achievementService
    )
    {
        $this->replyRepository=$replyRepository;
        $this->achievementRepository = $achievementRepository;
        $this->achievementService  = $achievementService;
    }

    public  function delete($id){
        $reply = Reply::findOrFail($id);

        if(!auth()->user()->can('modify',$reply)){
            return  false;
        }
        Reply::destroy($id);

        return true;
    }

    public function store(ReplyStoreRequest $request){
        if(!auth()->user()->can('store',Reply::class)){
            return  false;
        }

        $isNotFirstTime  = auth()->user()->replies()->exists();
        $newTeacherAchievement = $this->achievementRepository->getByNameOrNull("ဖြေကြားသူ");

        if(!$isNotFirstTime && !$this->achievementRepository->isExist(auth()->user(),$newTeacherAchievement)){
            $this->achievementService->storeUserAchievement(auth()->user(),$newTeacherAchievement);
            auth()->user()->notify(new GotNewAchievement($newTeacherAchievement, auth()->user()));
        }

        $reply= new Reply($request->validated());
        $reply->fill(['user_id'=>auth()->id()])->save();

        return true;
    }

    public function storenested(ReplyStoreRequest $request){
        if(!auth()->user()->can('store',Reply::class)){
            return  false;
        }

        $reply= new Reply($request->validated());
        $reply->fill(['user_id'=>auth()->id(),'parent_id'=>$request->id])->save();

        return true;
    }

    public function update(ReplyUpdateRequest $request){
        $reply = Reply::findOrFail($request->id);

        if(!auth()->user()->can('modify',$reply)){
            return  false;
        }

         $reply->update($request->only(['body']));

         return true;
    }

}
