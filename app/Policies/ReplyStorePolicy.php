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
    //all users can reply
    public function store(User $user)
    {
        return true;
    }

    //users can delete their own repl
    public function delete(User $user,$reply){
         return $user->id==$reply->user_id;
    }

    //only owner can update
    public function update(User $user,Reply $reply){
        return $user->id===$reply->user_id;
    }
}
