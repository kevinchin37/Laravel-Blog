<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Post extends Model
{
    protected $guarded = [];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function addCategory($category)
    {
        if (!empty($category)) {
            $this->categories()->attach($category);
        }
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
