<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Activity extends Model {
    protected $guarded = [];

    public function loggable() {
        return $this->morphTo();
    }

    public function createLog($type, $message) {
        $this->create([
            'type' => $type,
            'message' => $message
        ]);
    }

    public function getCreatedAtAttribute($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/y, g:i:s A');
    }
}
