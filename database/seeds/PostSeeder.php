<?php

use App\Tag;
use App\Post;
use App\PostTag;
use App\Category;
use App\CategoryPost;
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

        // Disable event listeners
        Post::flushEventListeners();
        Category::flushEventListeners();
        Tag::flushEventListeners();
        CategoryPost::flushEventListeners();
        PostTag::flushEventListeners();

        factory(App\Post::class, 20)->create()->each(function($post) {
            $post->categories()->save(factory(App\Category::class)->make());
            $post->tags()->save(factory(App\Tag::class)->make());
        });
    }
}
