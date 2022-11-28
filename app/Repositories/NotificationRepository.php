<?php

namespace App\Repositories;

/**
 * Class AnswerRepository.
 */
class NotificationRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function paginate($maxCount=8)
    {
        return auth()->user()->notifications()->paginate($maxCount);
    }
}
