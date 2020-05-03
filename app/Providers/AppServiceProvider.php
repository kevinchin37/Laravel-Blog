<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use App\Observers\TagObserver;
use App\Observers\PostObserver;
use App\Observers\CategoryObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        Category::observe(CategoryObserver::class);
        Tag::observe(TagObserver::class);

        View::composer(['admin.post.create', 'admin.post.edit', 'admin.layouts.search'], function($view) {
            $view->with('categories', Category::all());
        });

        View::composer(['admin.layouts.search'], function($view) {
            $view->with('users', User::all());
        });
    }
}
