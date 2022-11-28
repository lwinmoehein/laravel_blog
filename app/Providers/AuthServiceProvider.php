<?php

namespace App\Providers;

use App\Policies\QuestionPolicy;
use App\Policies\AnswerPolicy;

use App\User;
use App\Question;
use App\Answer;
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
         Question::class => QuestionPolicy::class,
         Answer::class=>AnswerPolicy::class
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
