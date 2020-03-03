<?php

namespace App;

use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model {
    protected $guarded = [];

    public function loggable() {
        return $this->morphTo();
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedAtAttribute($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m/d/y, g:i:s A');
    }
}
