<?php

namespace App\Http\Controllers;

use App\Repositories\AchievementRepository;
use App\Services\AchievementService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\ReplyRepository;
use App\Services\ReplyService;
use App\Article;
use App\Http\Requests\ReplyDeleteRequest;
use App\Http\Requests\ReplyStoreRequest;
use App\Http\Requests\ReplyUpdateRequest;

class ReplyController extends Controller
{
    //
    protected $replyService;
    protected $replyRepository;
    protected $achievementService;
    protected $achievementRepository;

    public function __construct(
        ReplyRepository $replyRepository,
        AchievementService $achievementService,
        AchievementRepository $achievementRepository
    ){

            $this->replyRepository=$replyRepository;
            $this->replyService=new ReplyService(
                $replyRepository,
                $achievementRepository,
                $achievementService
            );

            $this->middleware('auth');

    }
    //store a reply
    public function store(ReplyStoreRequest $request){
        $reply=$this->replyService->store($request);
        dd($reply);
        if($reply){
            return view('components.reply-list-component',['article'=>$reply->article]);
        }
        return "error";
    }
    //store a nested reply
    public function storenested(ReplyStoreRequest $request){
        $reply=$this->replyService->storenested($request);
        if($reply){
            return view('components.reply-list-component',['article'=>$reply->article]);
        }
        return "error";
    }
     //store a reply
     public function update(ReplyUpdateRequest $request){

         if(Auth::user()->can('update',$this->replyRepository->get($request->id))){

            $reply=$this->replyService->update($request);
            if($reply){
                return view('components.reply-list-component',['article'=>$reply->article]);
            }

         }

        return "error";
    }

    //delete a reply from model
    public function destroy(ReplyDeleteRequest $request){
        $article=$this->replyRepository->get($request->id)->article;

        if(Auth::user()->can('delete',$this->replyRepository->get($request->id))){
            if($this->replyService->delete($request->id)){
                return view('components.reply-list-component',['article'=>$article]);
            }
        }
        return "error";

    }




}
