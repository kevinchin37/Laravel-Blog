<?php

namespace App\Services;

class ImageService {

    public $image;

    public function uploadHandler($image) {
        $this->image = $image;
        return $this;
    }

    public function getFileName() {
        return time() . '-' . $this->image->getClientOriginalName();
    }

    public function store() {
        return $this->image->storeAs('uploads', $this->getFileName(), 'public');
    }
}
