<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

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

    public function deleteImage($image) {
        if (Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }
    }
}
