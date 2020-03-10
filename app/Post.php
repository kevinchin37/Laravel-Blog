<?php

namespace App;

use App\PostTag;
use App\CategoryPost;
use Illuminate\Support\Carbon;
use App\Http\Support\Traits\LoggableActivity;
use App\Http\Support\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'featured_image', 'slug', 'user_id'];

    use LoggableActivity;
    use Sluggable;

    public function categories() {
        return $this->belongsToMany(Category::class)->using(CategoryPost::class);
    }

    public function addCategories($attributes) {
        if (empty($attributes['categories'])) return;

        foreach($attributes['categories'] as $category) {
            $this->categories()->attach($category);
        }
    }

    public function updateCategories($attributes) {
        $categories = !empty($attributes['categories']) ? $attributes['categories'] : null;
        $this->categories()->sync($categories);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class)->using(PostTag::class);;
    }

    public function addTags($attributes) {
        if (empty($attributes['tags'])) return;

        foreach($attributes['tags'] as $tag) {
            $this->tags()->attach($tag);
        }
    }

    public function updateTags($attributes) {
        $tags = !empty($attributes['tags']) ? $attributes['tags'] : null;
        $this->tags()->sync($tags);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
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
