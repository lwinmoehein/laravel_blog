<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ReplyRepository.
 */
use App\Reply;
class ReplyRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function all()
    {
        return Reply::all();

    }
    public function get($id){
        return Reply::findOrFail($id);
    }

    public function getRelatedReplies($id){
        return Reply::find($id)->article->replies;
    }
}
