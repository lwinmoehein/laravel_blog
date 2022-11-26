<?php
namespace App\Services;
use App\Repositories\VoteRepository;
use App\Vote;

class VoteService
{
    protected $repository;

    public function __construct(VoteRepository $repository)
    {
        $this->repository=$repository;
    }

    public function upVote($articleId){
        if(!auth()->user()->can('upVote',Vote::class)){
            return  false;
        }

        Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',-1)->delete();
        Vote::create([
            "article_id"=>$articleId,
            "voter_id"=>auth()->user()->id,
            "value"=>1
        ]);
        return  true;
    }

    public function downVote($articleId){
        if(!auth()->user()->can('downVote',Vote::class)){
            return  false;
        }

        Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',1)->delete();
        Vote::create([
            "article_id"=>$articleId,
            "voter_id"=>auth()->user()->id,
            "value"=>-1
        ]);
        return  true;
    }
    public function removeDownVote($articleId){
        if(!auth()->user()->can('downVote',Vote::class)){
            return  false;
        }
        Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',-1)->delete();

        return true;
    }
    public function removeUpVote($articleId){
        if(!auth()->user()->can('upVote',Vote::class)){
            return  false;
        }
        Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',1)->delete();

        return true;
    }
}
