<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\ReplyRepository;
use App\Services\ReplyService;
use App\Article;
use App\Http\Requests\ReplyStoreRequest;

class ReplyController extends Controller
{
    //
    protected $replyService;
    protected $replyRepository;

    public function __construct(ReplyRepository $replyRepository){

            $this->replyRepository=$replyRepository;
            $this->replyService=new ReplyService($replyRepository);
            $this->middleware('auth');

    }
    //store a reply
    public function store(ReplyStoreRequest $request){
        $reply=$this->replyService->store($request);
        if($reply){
            return view('components.reply-list-component',['article'=>$reply->article]);
        }else{
            return "error";
        }
    }
    //delete a reply from model
    public function destroy($id){

        $article=$this->replyRepository->get($id)->article;
        if(Auth::user()->can('delete',$this->replyRepository->get($id))){
            if($this->replyService->delete($id)){
                return view('components.reply-list-component',['article'=>$article]);
            }
        }
        return "error";

    }

}
