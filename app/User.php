<?php

namespace App;

use App\Role;
use App\Activity;
use App\Http\Support\Traits\LoggableActivity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use LoggableActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    /**
     * Check if user has a specific role
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role) {
        return $this->role->name == $role;
    }

    /**
     * Check if user has permissions to perform certain actions
     *
     * @param string $action
     * @return bool
     */
    public function hasPermission($action) {
        return $this->role->permissions->contains('action', $action);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
