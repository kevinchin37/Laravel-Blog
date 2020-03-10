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

    /**
     * Post's categories
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories() {
        return $this->belongsToMany(Category::class)->using(CategoryPost::class);
    }

    /**
     * Attach categories to a post
     *
     * @param array $attributes
     * @return void
     */
    public function addCategories($attributes) {
        if (empty($attributes['categories'])) return;

        foreach($attributes['categories'] as $category) {
            $this->categories()->attach($category);
        }
    }

    /**
     * Update categories of a post
     *
     * @param array $attributes
     * @return void
     */
    public function updateCategories($attributes) {
        $categories = !empty($attributes['categories']) ? $attributes['categories'] : null;
        $this->categories()->sync($categories);
    }

    /**
     * Post's tags
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags() {
        return $this->belongsToMany(Tag::class)->using(PostTag::class);;
    }

    /**
     * Attach tag(s) to a post
     *
     * @param array $attributes
     * @return void
     */
    public function addTags($attributes) {
        if (empty($attributes['tags'])) return;

        foreach($attributes['tags'] as $tag) {
            $this->tags()->attach($tag);
        }
    }

    /**
     * Update tag(s) of a post
     *
     * @param array $attributes
     * @return void
     */
    public function updateTags($attributes) {
        $tags = !empty($attributes['tags']) ? $attributes['tags'] : null;
        $this->tags()->sync($tags);
    }

    /**
     * Post's author
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
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

    /**
     * Format a post's date
     *
     * @param string $date
     * @return string
     */
    public function getCreatedAtAttribute($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/y, g:i:s A');
    }
}
