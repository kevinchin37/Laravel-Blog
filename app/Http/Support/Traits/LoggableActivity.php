<?php

namespace App\Http\Support\Traits;
use App\Activity;

trait LoggableActivity {
    public function recordActivity($type, $message) {
        $attributes = [
            'type' => $type,
            'message' => $message,
        ];

        if (!empty(auth()->user()->id)) {
            $attributes['user_id'] = auth()->user()->id;
        }

        $this->logs()->create($attributes);
    }

    public function logs() {
        return $this->morphMany(Activity::class, 'loggable');
    }
}
