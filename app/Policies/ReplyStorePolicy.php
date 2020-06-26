<?php

namespace App\Policies;

use App\User;
use App\Reply;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyStorePolicy
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
    public function store(User $user)
    {
        return true;
    }
    public function delete(User $user,$reply){
         return $user->id==$reply->user_id;
    }
}
