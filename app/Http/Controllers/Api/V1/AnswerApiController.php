<?php

namespace App\Http\Controllers\Api\V1;

use App\Repositories\AchievementRepository;
use App\Services\AchievementService;
use App\View\Components\ArticleEditFormComponent;
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
class AnswerApiController extends Controller
{
    //
    use ApiResponseHelpers;

    protected $answerService;
    protected $answerRepository;
    protected $achievementService;
    protected $achievementRepository;

    public function __construct(
        AnswerRepository      $answerRepository,
        AchievementService    $achievementService,
        AchievementRepository $achievementRepository
    ){
        $this->answerRepository=$answerRepository;
        $this->answerService=new AnswerService(
            $answerRepository,
            $achievementRepository,
            $achievementService
        );
    }

    public  function index(Question $article){
        return response()->json(["data"=>$article]);
    }
    //store a reply
    public function store(AnswerStoreRequest $request){
        $reply=$this->answerService->store($request);

        if($reply){
            return $this->respondCreated([
                "data"=>$reply
            ]);
        }
        return $this->respondError("Store Answer Failed");

    }
    //store a nested reply
    public function storenested(AnswerStoreRequest $request){
        $reply=$this->answerService->storenested($request);
        if($reply){
            return $this->respondCreated([
                "data"=>$reply
            ]);
        }
        return $this->respondError("Store Answer Failed");

    }
    //store a reply
    public function update(AnswerUpdateRequest $request){

        if(Auth::user()->can('update',$this->answerRepository->get($request->id))){

            $answer=$this->answerService->update($request);
            if($answer){
                return $this->respondWithSuccess();
            }

        }

        return $this->respondError("Update Failed");
    }

    //delete a reply from model
    public function destroy(AnswerDeleteRequest $request){
        $answer = $this->answerRepository->get($request->id)->article;

        if(Auth::user()->can('delete',$this->answerRepository->get($request->id))){
            if($this->answerService->delete($request->id)){
                return $this->respondWithSuccess();
            }
        }

        return $this->respondError("Delete Failed");


    }




}
