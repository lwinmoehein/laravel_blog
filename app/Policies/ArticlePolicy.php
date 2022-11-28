<?php

namespace App\Policies;

use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

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

    public function vote(User $user){
        return $user->email_verified_at!=null;
    }

    public function upVote(User $user,Article $article)
    {
        return $user->id == $article->user_id? Response::allow()
            : Response::deny('Cannot upvote your own post.');
    }
    public function downVote(?User $user,Article $article)
    {
        return $user->id == $article->user_id? Response::allow()
            : Response::deny('Cannot downvote your own post.');
    }
}
