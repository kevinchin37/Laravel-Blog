<?php

namespace App\Listeners;

use App\Events\InvitationAccepted;
use App\Invitation;

class InvitationUpdate
{
    /**
     * Handle the event.
     *
     * @param  InvitationAccepted  $event
     * @return void
     */
    public function handle(InvitationAccepted $event) {
        Invitation::where('email', $event->user->email)->update([
            'token' => NULL,
            'status' => 'accepted'
        ]);
    }
}
