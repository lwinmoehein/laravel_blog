<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        //
        "title"=>$faker->text(40),
        "body"=>$faker->text(400),
        "user_id"=>rand(1,2)
        ];
});
