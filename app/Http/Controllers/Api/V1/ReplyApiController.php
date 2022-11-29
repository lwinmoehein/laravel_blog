<?php

namespace App\Http\Controllers\Api\V1;

use App\Repositories\AchievementRepository;
use App\Services\AchievementService;
use F9Web\ApiResponseHelpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\AnswerRepository;
use App\Services\AnswerService;
use App\Question;
use App\Http\Requests\AnswerDeleteRequest;
use App\Http\Requests\AnswerStoreRequest;
use App\Http\Requests\AnswerUpdateRequest;
use App\Http\Controllers\Controller;

class ReplyApiController extends Controller
{
    //
    use ApiResponseHelpers;

    protected $replyService;
    protected $replyRepository;
    protected $achievementService;
    protected $achievementRepository;

    public function __construct(
        AnswerRepository      $replyRepository,
        AchievementService    $achievementService,
        AchievementRepository $achievementRepository
    ){
        $this->replyRepository=$replyRepository;
        $this->replyService=new AnswerService(
            $replyRepository,
            $achievementRepository,
            $achievementService
        );
    }
    //store a reply
    public function store(AnswerStoreRequest $request){
        $reply=$this->replyService->store($request);

        if($reply){
            return $this->respondCreated([
                "data"=>$reply
            ]);
        }
        return $this->respondError("Store Answer Failed");

    }
    //store a nested reply
    public function storenested(AnswerStoreRequest $request){
        $reply=$this->replyService->storenested($request);
        if($reply){
            return $this->respondCreated([
                "data"=>$reply
            ]);
        }
        return $this->respondError("Store Answer Failed");

    }
    //store a reply
    public function update(AnswerUpdateRequest $request){

        if(Auth::user()->can('update',$this->replyRepository->get($request->id))){

            $reply=$this->replyService->update($request);
            if($reply){
                return $this->respondWithSuccess();
            }

        }

        return $this->respondError("Update Failed");
    }

    //delete a reply from model
    public function destroy(AnswerDeleteRequest $request){
        $article=$this->replyRepository->get($request->id)->article;

        if(Auth::user()->can('delete',$this->replyRepository->get($request->id))){
            if($this->replyService->delete($request->id)){
                return $this->respondWithSuccess();
            }
        }
        return $this->respondError("Delete Failed");


    }




}
