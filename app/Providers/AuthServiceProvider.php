<?php

namespace App\Providers;

use App\Policies\ArticlePolicy;
use App\Policies\ReplyPolicy;
use App\Policies\VotePolicy;

use App\User;
use App\Article;
use App\Reply;
use App\Vote;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         Article::class => ArticlePolicy::class,
         Reply::class=>ReplyPolicy::class,
        Vote::class=>VotePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
