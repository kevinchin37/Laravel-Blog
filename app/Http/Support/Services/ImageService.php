<?php

namespace App\Support\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService {
    private $file;
    private $disk = 'public';

    /**
     * Sets up the UploadedFile instance for storing images
     *
     * @param Illuminate\Http\UploadedFile $file
     */
    public function uploadHandler(UploadedFile $file) {
        $this->file = $file;

        return $this;
    }

    /**
     * Get the original file name with the time prepended to it
     *
     * @return string
     */
    public function getFileName() {
        return time() . '-' . $this->file->getClientOriginalName();
    }

    /**
     * Set the disk to store image to
     *
     * @param string $diskName
     * @return $this
     */
    public function disk($diskName) {
        $this->disk = $diskName;

        return $this;
    }

    /**
     * Store the image
     *
     * @return string|false
     */
    public function store() {
        return $this->file->storeAs('uploads', $this->getFileName(), $this->disk);
    }

    /**
     * Delete an existing image
     */
    public function delete($file) {
        if (Storage::disk($this->disk)->exists($file)) {
            Storage::disk($this->disk)->delete($file);
        }
    }

    /**
     * Deletes the current post image and replaces it with the new uploaded image
     *
     * @param string $storedfile
     * @return string|false
     */
    public function update($storedfile) {
        $this->delete($storedfile);

        return $this->store();
    }
}
