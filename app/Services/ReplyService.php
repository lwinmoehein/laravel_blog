<?php
namespace App\Services;

use App\Achievement;
use App\Notifications\GotNewAchievement;
use App\Reply;
use App\Http\Requests\ReplyStoreRequest;
use App\Http\Requests\ReplyUpdateRequest;
use App\Repositories\ReplyRepository;

class ReplyService
{
    protected $repository;

    public function __construct(ReplyRepository $repository)
    {
        $this->repository=$repository;
    }

    public  function delete($id){
        return Reply::destroy($id);
    }

    public function store(ReplyStoreRequest $request){
        $isNotFirstTime  = auth()->user()->replies()->exists();
        $newTeacherAchievement = Achievement::where('name',"ဆရာလေး")->get()->first();

        if(!$isNotFirstTime){
            auth()->user()->notify(new GotNewAchievement($newTeacherAchievement, auth()->user()));
        }

        $reply= new Reply($request->validated());
        $reply->fill(['user_id'=>auth()->id()])->save();
        return $reply;
    }

    public function storenested(ReplyStoreRequest $request){
        $reply= new Reply($request->validated());
        $reply->fill(['user_id'=>auth()->id(),'parent_id'=>$request->id])->save();
        return $reply;
    }

    public function update(ReplyUpdateRequest $request){
         $reply= Reply::find($request->id);
         $reply->update($request->only(['body']));
         return $reply;

    }

}
