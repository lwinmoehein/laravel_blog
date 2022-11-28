<?php

namespace App\Policies;

use App\User;
use App\Answer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function modify(?User $user, Answer $reply)
    {
        return $user->email_verified_at!=null && $reply->user_id == $user->id;
    }
    public function store(?User $user){
        return $user->email_verified_at!=null;
    }
}
