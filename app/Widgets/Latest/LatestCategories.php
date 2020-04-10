<?php

namespace App\Widgets\Latest;

use App\Category;
use App\Widgets\Contracts\Latest\Entry;
use App\Widgets\Contracts\Widget;

class LatestCategories implements Entry, Widget {
    protected $count;
    protected $template;

    public function __construct($count = 5, $template = 'widgets.latest.category') {
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

    /**
     * Get the widget's settings
     *
     * @return array
     */
    public function getSettings() {
        return [
            'categories' => $this->getLatest(),
            'template' => $this->template
        ];
    }
}
