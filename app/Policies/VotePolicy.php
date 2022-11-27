<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Vote;

class VotePolicy
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

    public function upVote()
    {
        return auth()->user()->email_verified_at!=null;
    }
    public function downVote()
    {
        return auth()->user()->email_verified_at!=null;
    }
}
