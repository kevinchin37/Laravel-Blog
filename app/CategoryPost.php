<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryPost extends Pivot
{
    public static function boot() {
        parent::boot();

        static::saved(function ($categoryPost) {
            $currentPost = Post::find($categoryPost->post_id);
            $currentPost->logs()->create([
                'type' => 'update',
                'message' => 'The category \'' . Category::find($categoryPost->category_id)->name . '\' was set.'
            ]);
        });

        static::deleted(function ($categoryPost) {
            $currentPost = Post::find($categoryPost->post_id);
            $currentPost->logs()->create([
                'type' => 'update',
                'message' => 'The category \'' . Category::find($categoryPost->category_id)->name . '\' was unset.'
            ]);
        });
    }
}
