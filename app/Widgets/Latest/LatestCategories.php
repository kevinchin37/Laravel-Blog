<?php

namespace App\Widgets\Latest;

use App\Category;
use App\Widgets\Latest\Entry;

class LatestCategories extends Entry {
    protected $count;
    protected $template;

    public function __construct($count = 5, $template = 'widgets.latestEntries') {
        $this->count = $count;
        $this->template = $template;
    }

    /**
     * Get latest categories
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatest() {
        return (new Category)
            ->latest()
            ->get()
            ->take($this->count);
    }
}
