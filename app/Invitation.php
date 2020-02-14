<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model {

    protected $guarded = [];

    public function generateToken($email) {
        if (empty($email)) return null;

        return Hash::make($email);
    }

    public function validateToken($email) {
        if (empty($email)) return false;

        $invitation = $this->where('email', $email)->first();

        if (empty($invitation->email)) return false;

        return Hash::check($email, $invitation->token);
    }

    public function getInviteLink() {
        return url('/invitation/' . $this->id . '/?invitation_token=' . $this->token);
    }
}
