<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\ReplyRepository;
use App\Services\ReplyService;
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
            return redirect()->back()->with('message','You replied to this article');
        }else{
            return redirect()->back()->with('message','failed to reply to this article');
        }
    }
    //delete a reply from model
    public function destroy($id){
        if(Auth::user()->can('delete',$this->replyRepository->get($id))){
            if($this->replyService->delete($id)){
                return redirect()->back()->with('message','comment Deleted');
            }
        }
        return redirect()->back()->with('message','not allowed to delete this reply');

    }

}
