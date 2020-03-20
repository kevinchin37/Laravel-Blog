<?php

namespace App\Widgets\Latest;

use App\Widgets\Contracts\Widget as WidgetContract;

abstract class Entry implements WidgetContract {
    abstract public function getLatest();

    /**
     * Get widget settings
     *
     * @return array
     */
    public function getSettings() {
        return [
            'entries' => $this->getLatest(),
            'template' => $this->template
        ];
    }
}
