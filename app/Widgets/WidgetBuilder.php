<?php

namespace App\Widgets;

use App\Widgets\Contracts\Widget;

class WidgetBuilder {
    protected $widget;
    protected $title;
    protected $columns;

    public function __construct(Widget $widget, $title = 'Widget', $columns = 6) {
        $this->widget = $widget;
        $this->title = $title;
        $this->columns = $columns;
    }

    /**
     * Get widget settings
     *
     * @return array $settings
     */
    public function getSettings() {
        $settings = [
            'title' => $this->title,
            'columns' => $this->columns,
        ];
        $settings = array_merge($settings, $this->widget->getSettings());

        return $settings;
    }

}
