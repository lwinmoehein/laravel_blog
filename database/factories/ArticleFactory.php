<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        //
        "title"=>$faker->text(40),
        "body"=>$faker->text(400),
        "user_id"=>rand(1,2)
        ];
});
