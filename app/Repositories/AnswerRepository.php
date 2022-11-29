<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AnswerRepository.
 */
use App\Answer;
class AnswerRepository
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
        return Answer::find($id)->question->answers;
    }
}
