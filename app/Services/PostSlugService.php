<?php

use App\Http\Interfaces\SlugInterface;

class PostSlugService implements SlugInterface {

    function isSlugUnique($slug) {
        return Post::where('slug', '=', $slug)->get()->isNotEmpty();
    }

    function incrementSlug($slug) {
        $slugCount = Post::where('slug', 'like', $slug . '-%')->get()->count() + 1;
        return $slug . '-' . $slugCount;
    }

    function getSlug($title) {
        $slug = str_slug($title);
        if (!$this->isSlugUnique($slug)) {
            $slug = $this->incrementSlug($slug);
        }

        return $slug;
    }
}
