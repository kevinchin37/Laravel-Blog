<?php

namespace App;

use App\Http\Support\Traits\Sluggable;
use App\User;
use App\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const OWNER_ROLE_ID = 1;
    const ADMIN_ROLE_ID = 2;
    const EDITOR_ROLE_ID = 3;
    const GUEST_ROLE_ID = 4;

    protected $fillable = ['name', 'slug'];

    use Sluggable;

    public function users() {
        return $this->hasMany(User::class);
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Add permissions to a role
     *
     * @param array $actions
     * @return void
     */
    public function addPermissions($actions) {
        $this->permissions()->attach($actions);
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
