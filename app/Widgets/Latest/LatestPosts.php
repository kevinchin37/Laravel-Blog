<?php

namespace App\Widgets\Latest;

use App\Post;
use App\Widgets\Contracts\Latest\Entry;
use App\Widgets\Contracts\Widget;


class LatestPosts implements Entry, Widget {
    protected $count;
    protected $template;

    public function __construct($count = 5, $template = 'widgets.latest.post') {
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

    /**
     * Get the widget's settings
     *
     * @return array
     */
    public function getSettings() {
        return [
            'posts' => $this->getLatest(),
            'template' => $this->template
        ];
    }
}
