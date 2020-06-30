<?php

namespace App\Policies;

use App\User;
use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImageStorePolicy
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

    public function delete(User $user,Image $image){
        return $user->id===$image->user_id;
    }
}
