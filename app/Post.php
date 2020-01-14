<?php

namespace App;

use App\PostTag;
use App\Activity;
use App\CategoryPost;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'featured_image', 'slug', 'user_id'];

    public function categories() {
        return $this->belongsToMany(Category::class)->using(CategoryPost::class);
    }

    public function addCategories($categories) {
        foreach($categories as $category) {
            $this->categories()->attach($category);
        }
    }

    public function updateCategories($categories) {
        $this->categories()->sync($categories);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->using(PostTag::class);;
    }

    public function addTags($tags) {
        foreach($tags as $tag) {
            $this->tags()->attach($tag);
        }
    }

    public function updateTags($tags) {
        $this->tags()->sync($tags);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function logs() {
        return $this->morphMany(Activity::class, 'loggable');
    }

    public function slugExist($slug) {
       return $this->where('slug', '=', $slug)->get()->isNotEmpty();
    }

    public function incrementSlug($slug) {
        $slugCount = $this->where('slug', 'like', $slug . '-%')->get()->count() + 1;
        return $slug . '-' . $slugCount;
    }

    public function getSlug($title) {
        $slug = Str::slug($title);
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
    public function getRouteKeyName() {
        return 'slug';
    }

    public function getCreatedAtAttribute($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/y, g:i:s A');
    }
}
