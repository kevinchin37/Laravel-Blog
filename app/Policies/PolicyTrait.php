<?php
namespace App\Policies;

trait PolicyTrait {
    public function before($user, $ability) {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
}

