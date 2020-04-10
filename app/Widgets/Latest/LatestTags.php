<?php

namespace App\Widgets\Latest;

use App\Tag;
use App\Widgets\Contracts\Latest\Entry;
use App\Widgets\Contracts\Widget;

class LatestTags implements Entry, Widget {
    protected $count;
    protected $template;

    public function __construct($count = 5, $template = 'widgets.latest.tag') {
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

    /**
     * Get the widget's settings
     *
     * @return array
     */
    public function getSettings() {
        return [
            'tags' => $this->getLatest(),
            'template' => $this->template
        ];
    }
}
