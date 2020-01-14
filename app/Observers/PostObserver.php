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
        $post->logs()->create([
            'type' => 'create',
            'message' => '\'' . $post->title  . '\' was created.'
        ]);
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updated(Post $post) {
        $updatedFields = $post->getChanges();
        // dd($post->getOriginal(), $post->getChanges(), $post->syncChanges());
        $updatedFields = array_keys($updatedFields);

        if (!empty($updatedFields)) {
            foreach ($updatedFields as $field) {
                if ($field === 'updated_at') continue;
                $post->logs()->create([
                    'type' => 'update',
                    'message' => ucfirst($field) . ' was updated.'
                ]);
            }
        }
    }

    public function saving(Post $post) {
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post) {
        $post->logs()->create([
            'type' => 'delete',
            'message' => '\'' . $post->title  . '\' was deleted.'
        ]);
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
