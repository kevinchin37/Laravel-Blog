<?php

namespace App\Observers;

use App\Post;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function created(Post $post) {
        $message = '\'' . $post->title  . '\' was created.';
        $post->recordActvity('create', $message);
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updated(Post $post) {
        $updatedFields = $post->getChanges();
        $updatedFields = array_keys($updatedFields);

        if (!empty($updatedFields)) {
            foreach ($updatedFields as $field) {
                if ($field === 'updated_at') continue;
                $message = ucfirst($field) . ' was updated.';
                $post->recordActvity('update', $message);
            }
        }
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post) {
        $message = '\'' . $post->title  . '\' was deleted.';
        $post->storeActvityLog('delete', $message);
    }
}
