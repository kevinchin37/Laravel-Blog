<?php

namespace App\Observers;

use App\Role;
use App\User;

class RoleObserver
{
    /**
     * Handle the role "deleted" event.
     *
     * @param  \App\Role  $role
     * @return void
     */
    public function deleted(Role $role) {
        User::where('role_id', null)->update(['role_id' => Role::GUEST_ROLE_ID]);
    }
}
