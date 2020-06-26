<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\ReplyRepository;
use App\Services\ReplyService;
use Illuminate\Http\Request;
use App\Reply;
use App\Http\Requests\ReplyStoreRequest;
class ReplyController extends Controller
{
    //
    protected $replyService;
    public function __construct(ReplyRepository $replyRepository){
            $this->replyService=new ReplyService($replyRepository);
            $this->middleware('auth');

    }
    public function store(ReplyStoreRequest $request){
        $reply=$this->replyService->store($request);
        if($reply){
            return redirect()->back()->with('message','You replied to this article');
        }else{
            return redirect()->back()->with('message','failed to reply to this article');
        }
    }
    public function destroy($id){
        if(Auth::user()->can('delete',$this->replyService->get($id))){
            if($this->replyService->delete($id)){
                return redirect()->back()->with('message','comment Deleted');
            }
        }
        return redirect()->back()->with('message','not allowed to delete this reply');

    }

}
