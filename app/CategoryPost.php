<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryPost extends Pivot
{
    public static function boot() {
        parent::boot();

        static::saved(function ($categoryPost) {
            $currentPost = Post::find($categoryPost->post_id);
            $message = 'The category \'' . Category::find($categoryPost->category_id)->name . '\' was set.';
            $currentPost->recordActvity('update', $message);
        });

        static::deleted(function ($categoryPost) {
            $currentPost = Post::find($categoryPost->post_id);
            $message = 'The category \'' . Category::find($categoryPost->category_id)->name . '\' was unset.';
            $currentPost->recordActvity('update', $message);
        });
    }
}
