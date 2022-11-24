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
        return Vote::create([
            "article_id"=>$articleId,
            "voter_id"=>auth()->user()->id,
            "value"=>1
        ]);
    }

    public function downVote($articleId){
        return Vote::create([
            "article_id"=>$articleId,
            "voter_id"=>auth()->user()->id,
            "value"=>-1
        ]);
    }
    public function removeDownVote($articleId){
        return Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',-1)->delete();
    }
    public function removeUpVote($articleId){
        return Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',1)->delete();
    }
}
