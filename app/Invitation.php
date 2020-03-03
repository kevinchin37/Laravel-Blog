<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model {

    protected $guarded = [];

    /**
     * Create a token based on an email address
     *
     * @param string $email
     * @return Hash
     */
    public function generateToken($email) {
        if (empty($email)) return null;

        return Hash::make($email);
    }

    /**
     * Check if a token is valid
     *
     * @param string $email
     * @return Hash
     */
    public function validateToken($email) {
        if (empty($email)) return false;

        $invitation = $this->where('email', $email)->first();

        if (empty($invitation->email)) return false;

        return Hash::check($email, $invitation->token);
    }

    /**
     * Create a url with token as a parameter
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getInviteLink() {
        if (empty($this->token)) return null;

        return url('/invitation/' . $this->id . '/?invitation_token=' . $this->token);
    }
}
