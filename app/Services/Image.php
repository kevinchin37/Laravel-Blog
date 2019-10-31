<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class Image {

    public $image;
    public function __construct() {}

    public function imageUploadHandler($image)
    {
        if (!is_null($image)) {
            $this->image = $image;
        }

        return $this;
    }

    public function getFileName()
    {
        return time() . '-' . $this->image->getClientOriginalName();
    }

    public function store()
    {
        return $this->image->storeAs('uploads', $this->getFileName(), 'public');
    }

    public function deleteImage() {}
    public function isDuplicateImage() {}
}
