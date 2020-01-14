<?php

namespace App\Observers;

use App\Category;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function created(Category $category) {
        $category->logs()->create([
            'type' => 'create',
            'message' => '\'' . $category->name  . '\' was created.'
        ]);
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function updated(Category $category) {
        $category->logs()->create([
            'type' => 'update',
            'message' => 'Name was updated.'
        ]);
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function deleted(Category $category) {
        $category->logs()->create([
            'type' => 'delete',
            'message' => '\'' . $category->name . '\' was deleted.'
        ]);
    }
}
