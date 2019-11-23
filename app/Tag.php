<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    public function getTags() {
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
