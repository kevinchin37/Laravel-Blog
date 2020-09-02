<?php

use Intervention\Image\Facades\Image;

if (!function_exists('resizeAndStoreImage')) {
    /**
     * Resize and store image to a specific path and directory
     *
     * @param Illuminate\Http\UploadedFile $upload
     * @param array $settings
     * @return string
     */
    function resizeAndStoreImage($upload, $settings) {
        $defaultSettings = [
            // 16:9
            'width' => 640,
            'height' => 360,
            'prefix' => 'upload',
            'path' => '/uploads',
            'directory' =>  'storage',
        ];

        if (!empty($settings)) $settings = array_merge($defaultSettings, $settings);

        $uploadedImage = Image::make($upload);
        $uploadedImage->resize($settings['width'], $settings['height'], function ($constraint) {
            $constraint->aspectRatio();
        });

        $filepath = $settings['path'] . '/' . $settings['prefix'] . '-' . time() .
            '-' . $settings['width'] . '-' . $settings['height'] .  '.' . $upload->extension();

        $uploadedImage->save(public_path($settings['directory']) . $filepath);

        return $filepath;
    }
}
