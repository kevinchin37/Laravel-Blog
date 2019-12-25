<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('posts')->delete();
        DB::table('categories')->delete();
        DB::table('tags')->delete();

        factory(App\Post::class, 20)->create()->each(function($post) {
            $post->categories()->save(factory(App\Category::class)->make());
            $post->tags()->save(factory(App\Tag::class)->make());
        });
    }
}
