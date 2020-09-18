<?php

namespace App;

use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
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
