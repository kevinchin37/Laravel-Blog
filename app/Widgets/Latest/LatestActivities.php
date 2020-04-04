<?php

namespace App\Widgets\Latest;

use App\Activity;
use App\Widgets\Latest\Entry;

class LatestActivities extends Entry {
    protected $count;
    protected $template;

    public function __construct($count = 5, $template = 'widgets.activityLog') {
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
}
