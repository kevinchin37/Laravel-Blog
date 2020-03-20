<?php

namespace App\Widgets\Latest;

use App\Post;
use App\Widgets\Latest\Entry;

class LatestPosts extends Entry {
    protected $count;
    protected $template;

    public function __construct($count = 5, $template = 'widgets.latestEntries') {
        $this->count = $count;
        $this->template = $template;
    }

    /**
     * Get latest posts
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatest() {
        return (new Post)
            ->latest()
            ->get()
            ->take($this->count);
    }
}
