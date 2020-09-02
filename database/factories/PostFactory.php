<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug = Str::slug($title);

    $paragraphs = '';
    for ($i=0; $i < mt_rand(3, 5); $i++) {
        $paragraphs .= '<p>' . $faker->paragraph(mt_rand(5, 10)) . '</p>';
    }

    return [
        'title' => $title,
        'slug' => $slug,
        'user_id' => 1, // admin
        'body' => $paragraphs,
        'featured_image' => ''


        // https://github.com/fzaninotto/Faker/issues/1884
        // 'featured_image' => $faker->image('public/storage', 300, 250, 'cats', false),
    ];
});
