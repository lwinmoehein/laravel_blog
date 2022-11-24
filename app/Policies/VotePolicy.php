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
    public function update(User $user,Vote $vote)
    {
        return $user->id===$vote->voter_id;
    }

    public function delete(User $user,Vote $vote){
        return $user->id===$vote->voter_id;
    }

    public function store(User $user)
    {
        return true;
    }
}
