<?php

namespace App\Observers;

use App\Tag;

class TagObserver
{
    /**
     * Handle the tag "created" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function created(Tag $tag) {
        $message = '\'' . $tag->name  . '\' was created.';
        $tag->recordActivity('create', $message);
    }

    /**
     * Handle the tag "updated" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function updated(Tag $tag) {
        $message = 'Name was updated.';
        $tag->recordActivity('update', $message);
    }

    /**
     * Handle the tag "deleted" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function deleted(Tag $tag) {
        $message = '\'' . $tag->name  . '\' was created.';
        $tag->recordActivity('delete', $message);
    }
}
