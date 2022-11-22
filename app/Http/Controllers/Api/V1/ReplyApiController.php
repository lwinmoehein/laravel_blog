<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Repositories\ReplyRepository;
use App\Services\ReplyService;
use App\Article;
use App\Http\Requests\ReplyDeleteRequest;
use App\Http\Requests\ReplyStoreRequest;
use App\Http\Requests\ReplyUpdateRequest;
use App\Http\Controllers\Controller;

class ReplyApiController extends Controller
{
    //
    protected $replyService;
    protected $replyRepository;

    public function __construct(ReplyRepository $replyRepository){
        $this->replyRepository=$replyRepository;
        $this->replyService=new ReplyService($replyRepository);
    }
    //store a reply
    public function store(ReplyStoreRequest $request){
        $reply=$this->replyService->store($request);
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
                return response()->json([
                    "message"=>"success"
                ]);
            }
        }
        return "error";

    }




}
