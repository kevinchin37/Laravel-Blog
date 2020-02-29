<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    public static function boot() {
        parent::boot();

        static::saved(function ($postTag) {
            $currentPost = Post::find($postTag->post_id);
            $message = 'The tag \'' . Tag::find($postTag->tag_id)->name . '\' was set.';
            $currentPost->recordActivity('update', $message);
        });

        static::deleted(function ($postTag) {
            $currentPost = Post::find($postTag->post_id);
            $message = 'The tag \'' . Tag::find($postTag->tag_id)->name . '\' was unset.';
            $currentPost->recordActivity('delete', $message);
        });
    }
}
