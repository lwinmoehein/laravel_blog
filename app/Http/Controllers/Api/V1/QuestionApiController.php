<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerStoreRequest;
use App\Http\Resources\AnswerResource;
use App\Question;
use App\Answer;
use App\Repositories\AchievementRepository;
use App\Repositories\AnswerRepository;
use App\Services\AchievementService;
use App\Services\AnswerService;
use F9Web\ApiResponseHelpers;
use App\Http\Resources\AnswerCollection;

class QuestionApiController extends Controller
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

    public  function answers(Question $question){
        $answers = Answer::where("question_id",$question->id)->paginate(5);

        return $this->respondWithSuccess([
            "message"=>"answers list",
            "data"=> new AnswerCollection($answers)
        ]);
    }

    public function storeAnswer(AnswerStoreRequest $request){
        $reply=$this->answerService->store($request);

        if($reply){
            return $this->respondCreated([
                "message"=>"success",
                "data"=>$reply
            ]);
        }
        return $this->respondError("Store Answer Failed");
    }
}
