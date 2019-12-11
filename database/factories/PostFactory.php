<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = Str::slug($title);

    return [
        'title' => $title,
        'slug' => $slug,
        'body' => $faker->paragraph,
    ];
});
