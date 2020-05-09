<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Role;
use App\User;
use App\Category;
use App\Permission;
use App\Observers\TagObserver;
use App\Observers\PostObserver;
use App\Observers\RoleObserver;
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
        Role::observe(RoleObserver::class);

        View::composer(['admin.post.create', 'admin.post.edit', 'admin.layouts.search'], function($view) {
            $view->with('categories', Category::all());
        });

        View::composer(['admin.layouts.search'], function($view) {
            $view->with('users', User::all());
        });

        View::composer(['admin.role.create', 'admin.role.edit'], function($view) {
            $view->with('permissions', Permission::all());
        });
    }
}
