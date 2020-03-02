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
        $event->user->recordActivity('register', $event->user->name . ' has registered');

        Invitation::where('email', $event->user->email)->update([
            'token' => NULL,
            'status' => 'accepted'
        ]);
    }
}
