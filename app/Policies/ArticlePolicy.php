<?php

namespace App\Policies;

use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
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
    public function modify(?User $user, Article $article)
    {
        return $user->email_verified_at!=null && $article->user_id == $user->id;
    }
    public function store(?User $user){
        return $user->email_verified_at!=null;
    }
}
