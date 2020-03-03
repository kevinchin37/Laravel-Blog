<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteLink extends Mailable
{
    use Queueable, SerializesModels;

    public $inviteLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inviteLink) {
        $this->inviteLink = $inviteLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->markdown('admin.email.invite', [
            'inviteLink' => $this->inviteLink
        ]);
    }
}
