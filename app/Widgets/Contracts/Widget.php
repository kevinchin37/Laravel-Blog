<?php

namespace App\Widgets\Contracts;

interface Widget {
    /**
     * Get the widget's settings
     *
     * @return array
     */
    public function getSettings();
}

