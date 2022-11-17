<?php

namespace App\Providers;

use App\Policies\ArticlePolicy;
use App\Policies\ReplyStorePolicy;
use App\User;
use App\Article;
use App\Policies\ImageStorePolicy;
use App\Reply;

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
         Reply::class=>ReplyStorePolicy::class,
         Image::class=>ImageStorePolicy::class,
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
