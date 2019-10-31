<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Image;

class FileUploadProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Image', function() {
            return new Image;
        })
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
