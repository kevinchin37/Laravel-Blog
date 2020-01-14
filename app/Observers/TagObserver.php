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
        $tag->logs()->create([
            'type' => 'create',
            'message' => '\'' . $tag->name  . '\' was created.'
        ]);
    }

    /**
     * Handle the tag "updated" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function updated(Tag $tag) {
        $tag->logs()->create([
            'type' => 'update',
            'message' => 'Name was updated.'
        ]);
    }

    /**
     * Handle the tag "deleted" event.
     *
     * @param  \App\Tag  $tag
     * @return void
     */
    public function deleted(Tag $tag) {
        $tag->logs()->create([
            'type' => 'delete',
            'message' => '\'' . $tag->name . '\' was deleted.'
        ]);
    }
}
