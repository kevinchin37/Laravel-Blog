<?php

namespace App\Http\Support\Traits;
use Illuminate\Support\Str;

trait Sluggable {
    /**
     * Check if slug already exists
     *
     * @param string $slug
     * @return bool
     */
    public function slugExist($slug) {
        return $this->where('slug', $slug)->get()->isNotEmpty();
    }

    /**
     * Append a slug count to make it unique
     *
     * @param string $slug
     * @return string
     */
    public function incrementSlug($slug) {
        $slugCount = $this->where('slug', 'like', $slug . '-%')->get()->count() + 1;
        return $slug . '-' . $slugCount;
    }

    /**
     * Create slug from title
     *
     * @param string $title
     * @return string
    */
    public function getSlug($title) {
        $slug = Str::slug($title);

        if ($this->slugExist($slug)) {
            $slug = $this->incrementSlug($slug);
        }

        return $slug;
    }
}
