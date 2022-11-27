<?php

namespace App\Repositories;

/**
 * Class ReplyRepository.
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
