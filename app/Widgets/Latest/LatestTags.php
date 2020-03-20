<?php

namespace App\Widgets\Latest;

use App\Tag;
use App\Widgets\Latest\Entry;

class LatestTags extends Entry {
    protected $count;
    protected $template;

    public function __construct($count = 5, $template = 'widgets.latestEntries') {
        $this->count = $count;
        $this->template = $template;
    }

    /**
     * Get latest tags
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatest() {
        return (new Tag)
            ->latest()
            ->get()
            ->take($this->count);
    }
}
