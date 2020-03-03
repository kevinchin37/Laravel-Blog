<?php

namespace App;

use App\Post;
use App\Http\Support\Traits\LoggableActivity;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    use LoggableActivity;

    public function posts() {
        return $this->belongsToMany(Post::class);
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
