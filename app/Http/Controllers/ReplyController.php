<?php

namespace App\Http\Controllers;

use App\Repositories\AchievementRepository;
use App\Services\AchievementService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\AnswerRepository;
use App\Services\AnswerService;
use App\Question;
use App\Http\Requests\AnswerDeleteRequest;
use App\Http\Requests\AnswerStoreRequest;
use App\Http\Requests\AnswerUpdateRequest;

class ReplyController extends Controller
{
    //
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

            $this->middleware('auth');

    }
    //store a reply
    public function store(AnswerStoreRequest $request){
        $reply=$this->replyService->store($request);
        dd($reply);
        if($reply){
            return view('components.reply-list-component',['article'=>$reply->article]);
        }
        return "error";
    }
    //store a nested reply
    public function storenested(AnswerStoreRequest $request){
        $reply=$this->replyService->storenested($request);
        if($reply){
            return view('components.reply-list-component',['article'=>$reply->article]);
        }
        return "error";
    }
     //store a reply
     public function update(AnswerUpdateRequest $request){

         if(Auth::user()->can('update',$this->replyRepository->get($request->id))){

            $reply=$this->replyService->update($request);
            if($reply){
                return view('components.reply-list-component',['article'=>$reply->article]);
            }

         }

        return "error";
    }

    //delete a reply from model
    public function destroy(AnswerDeleteRequest $request){
        $article=$this->replyRepository->get($request->id)->article;

        if(Auth::user()->can('delete',$this->replyRepository->get($request->id))){
            if($this->replyService->delete($request->id)){
                return view('components.reply-list-component',['article'=>$article]);
            }
        }
        return "error";

    }




}
