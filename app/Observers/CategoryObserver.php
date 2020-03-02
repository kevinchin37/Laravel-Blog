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
        $message = '\'' . $category->name  . '\' was created.';
        $category->recordActivity('create', $message);
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function updated(Category $category) {
        $message = 'Name was updated.';
        $category->recordActivity('update', $message);
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Category  $category
     * @return void
     */
    public function deleted(Category $category) {
        $message = '\'' . $category->name . '\' was deleted.';
        $category->recordActivity('delete', $message);
    }
}
