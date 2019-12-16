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

        factory(App\Post::class, 50)->create()->each(function($post) {
            $post->categories()->save(factory(App\Category::class)->make());
        });
    }
}
