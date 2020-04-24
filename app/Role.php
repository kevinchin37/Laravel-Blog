<?php

namespace App;

use App\User;
use App\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users() {
        return $this->hasMany(User::class);
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class);
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
