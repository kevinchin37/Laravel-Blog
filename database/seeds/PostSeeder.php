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
        Category::flushEventListeners();
        Tag::flushEventListeners();
        CategoryPost::flushEventListeners();
        PostTag::flushEventListeners();

        factory(Post::class, 20)->create()->each(function($post) {
            $post->categories()->save(factory(Category::class)->make());
            $post->tags()->save(factory(Tag::class)->make());
        });
    }
}
