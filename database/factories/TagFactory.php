<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    $slug = Str::slug($name);

    return [
        'name' => $name,
        'slug' => $slug,
    ];
});
