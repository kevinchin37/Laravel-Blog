<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

if (!function_exists('resizeAndStoreImage')) {
    /**
     * Resize and store image to a specific path and directory
     *
     * @param Illuminate\Http\UploadedFile $upload
     * @param array $settings
     * @return string
     */
    function resizeAndStoreImage($upload, $settings = []) {
        $imageSettings = [
            // 16:9
            'width' => 640,
            'height' => 360,
            'prefix' => 'upload',
            'path' => '/uploads',
            'directory' =>  'storage',
        ];

        if (!empty($settings) && is_array($settings)) {
            $imageSettings = array_merge($imageSettings, $settings);
        }

        if (!Storage::disk('public')->exists($imageSettings['path'])) {
            Storage::makeDirectory('public' . $imageSettings['path'] );
        }

        $uploadedImage = Image::make($upload);
        $uploadedImage->resize($imageSettings['width'], $imageSettings['height'], function ($constraint) {
            $constraint->aspectRatio();
        });

        $filepath = $imageSettings['path'] . '/' . $imageSettings['prefix'] . '-' . time() .
            '-' . $imageSettings['width'] . '-' . $imageSettings['height'] .  '.' . $upload->extension();

        $uploadedImage->save(public_path($imageSettings['directory']) . $filepath);

        return $filepath;
    }
}
