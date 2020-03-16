<?php

namespace App\Widgets;

use Illuminate\Database\Eloquent\Model;

class ActivityLog implements WidgetContract {
    private $model;
    private $count;
    private $template;

    public function __construct(Model $model, $count = 5, $template = 'widgets.activityLog') {
        $this->model = $model;
        $this->count = ($count > 5) ? 5 : $count;
        $this->template = $template;
    }

    public function getActivityLogs() {
        $entries = $this->model->latest()
            ->get()
            ->take(5);

        return $entries;
    }

    public function getSettings() {
        return [
            'activities' => $this->getActivityLogs(),
            'template' => $this->template
        ];
    }

}
