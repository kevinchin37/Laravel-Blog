<?php

namespace App\Widgets\Contracts\Latest;

interface Entry {
    /**
     * Get latest entries
     *
     * @return array
     */
    public function getLatest();
}
