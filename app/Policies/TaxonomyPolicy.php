<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaxonomyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create categories or tags.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user) {
        return $user->hasPermission('create');
    }

    /**
     * Determine whether the user can update the category or tag.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user) {
        return $user->hasPermission('update');
    }

    /**
     * Determine whether the user can delete the category or tag.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user) {
        return $user->hasPermission('delete');
    }

    /**
     * Give admin access to everything
     */
    public function before($user, $ability) {
        if ($user->hasRole('admin')) return true;
    }
}
