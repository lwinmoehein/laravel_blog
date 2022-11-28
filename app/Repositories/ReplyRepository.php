<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ReplyRepository.
 */
use App\Answer;
class ReplyRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function all()
    {
        return Answer::all();

    }
    public function get($id){
        return Answer::findOrFail($id);
    }

    public function getRelatedReplies($id){
        return Answer::find($id)->article->replies;
    }
}
