<?php

namespace App\Widgets\Latest;

use App\Activity;
use App\Widgets\Contracts\Latest\Entry;
use App\Widgets\Contracts\Widget;

class LatestActivities implements Entry, Widget {
    protected $count;
    protected $template;

    public function __construct($count = 5, $template = 'widgets.latest.activity') {
        $this->count = $count;
        $this->template = $template;
    }

    /**
     * Get latest posts
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatest() {
        return (new Activity())
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
            'activities' => $this->getLatest(),
            'template' => $this->template
        ];
    }
}
