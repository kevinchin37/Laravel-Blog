<?php

namespace App\Events;

use App\User;

class InvitationAccepted
{
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user) {
        $this->user = $user;
    }
}
