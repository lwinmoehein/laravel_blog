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

    public function upVote($questionId){

        Vote::where('question_id',$questionId)->where('voter_id',auth()->user()->id)->where('value',-1)->delete();

        Vote::create([
            "question_id"=>$questionId,
            "voter_id"=>auth()->user()->id,
            "value"=>1
        ]);
        return  true;
    }

    public function downVote($questionId){


        Vote::where('question_id',$questionId)->where('voter_id',auth()->user()->id)->where('value',1)->delete();
        Vote::create([
            "question_id"=>$questionId,
            "voter_id"=>auth()->user()->id,
            "value"=>-1
        ]);
        return  true;
    }
    public function removeDownVote($questionId){

        Vote::where('question_id',$questionId)->where('voter_id',auth()->user()->id)->where('value',-1)->delete();

        return true;
    }
    public function removeUpVote($questionId){

        Vote::where('question_id',$questionId)->where('voter_id',auth()->user()->id)->where('value',1)->delete();

        return true;
    }
}
