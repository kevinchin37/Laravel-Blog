<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'featured_image', 'slug'];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function addCategory($category)
    {
        if (!empty($category)) {
            $this->categories()->attach($category);
        }
    }

    public function slugExist($slug)
    {
       return $this->where('slug', '=', $slug)->get()->isNotEmpty();
    }

    public function incrementSlug($slug)
    {
        $slugCount = $this->where('slug', 'like', $slug . '-%')->get()->count() + 1;
        return $slug . '-' . $slugCount;
    }

    public function getSlug($title)
    {
        $slug = str_slug($title);
        if ($this->slugExist($slug)) {
            $slug = $this->incrementSlug($slug);
        }

        return $slug;
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
