<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\PostModel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(PostModel::class, function (Faker $faker) {
    return [
        'title' => Str::random(100),
        'slug' => Str::random(100),
        'content' => Str::random(100),
        'content_seo' => Str::random(250), // password
        'thumbnail' => Str::random(100),
        'user_id' => 1
    ];
});
