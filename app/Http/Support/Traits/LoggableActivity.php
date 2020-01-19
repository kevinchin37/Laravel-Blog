<?php

namespace App\Http\Support\Traits;
use App\Activity;

trait LoggableActivity {
    public function recordActvity($type, $message) {
        $this->logs()->create([
            'type' => $type,
            'message' => $message,
            'user_id' => $this->author->id
        ]);
    }

    public function logs() {
        return $this->morphMany(Activity::class, 'loggable');
    }
}
