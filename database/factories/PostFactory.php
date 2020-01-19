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
        'user_id' => 1, // admin
        'body' => $faker->paragraphs(mt_rand(15, 25), true),
        'featured_image' => ''


        // https://github.com/fzaninotto/Faker/issues/1884
        // 'featured_image' => $faker->image('public/storage', 300, 250, 'cats', false),
    ];
});
