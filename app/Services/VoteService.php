<?php
namespace App\Services;
use App\Repositories\VoteRepository;
use App\Vote;
use App\Question;

class VoteService
{
    protected $repository;

    public function __construct(
        VoteRepository $repository
    )
    {
        $this->repository=$repository;
    }

    public function upVote($articleId){

        Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',-1)->delete();

        Vote::create([
            "article_id"=>$articleId,
            "voter_id"=>auth()->user()->id,
            "value"=>1
        ]);
        return  true;
    }

    public function downVote($articleId){


        Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',1)->delete();
        Vote::create([
            "article_id"=>$articleId,
            "voter_id"=>auth()->user()->id,
            "value"=>-1
        ]);
        return  true;
    }
    public function removeDownVote($articleId){

        Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',-1)->delete();

        return true;
    }
    public function removeUpVote($articleId){

        Vote::where('article_id',$articleId)->where('voter_id',auth()->user()->id)->where('value',1)->delete();

        return true;
    }
}
