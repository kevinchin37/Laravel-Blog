<?php

namespace App\Widgets;

use Illuminate\Database\Eloquent\Model;

class LatestEntries implements WidgetContract {
    private $model;
    private $count;
    private $template;

    public function __construct(Model $model, $count = 5, $template = 'widgets.latestEntries') {
        $this->model = $model;
        $this->count = ($count > 5) ? 5 : $count;
        $this->template = $template;
    }

    public function getLatestEntries($count) {
        $entries = $this->model->latest()
            ->get()
            ->take($count);

        return $entries;
    }

    public function getSettings() {
        return [
            'entries' => $this->getLatestEntries($this->count),
            'template' => $this->template
        ];
    }
}

