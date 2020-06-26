<?php

namespace App\Http\Controllers;

use App\Repositories\ReplyRepository;
use App\Services\ReplyService;
use Illuminate\Http\Request;
use App\Http\Requests\ReplyStoreRequest;
class ReplyController extends Controller
{
    //
    protected $replyService;
    public function __construct(ReplyRepository $replyRepository){
            $this->replyService=new ReplyService($replyRepository);
    }
    public function store(ReplyStoreRequest $request){
        $reply=$this->replyService->store($request);
        if($reply){
            return redirect()->back()->with('message','You replied to this article');
        }else{
            return redirect()->back()->with('message','failed to reply to this article');
        }
    }
}
