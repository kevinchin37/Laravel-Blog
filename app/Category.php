<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $guarded = [];

    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    public function getCategories() {
        return $this->all();
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName() {
        return 'slug';
    }
}
