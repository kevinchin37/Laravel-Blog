<?php

namespace App;

use App\Http\Support\Traits\Sluggable;
use App\User;
use App\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug'];

    use Sluggable;

    public function users() {
        return $this->hasMany(User::class);
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Update permissions of a role
     *
     * @param array $actions
     * @return void
     */
    public function updatePermissions($actions) {
        if (empty($actions)) {
            $this->permissions()->detach();
        } else {
            $this->permissions()->sync($actions);
        }
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
