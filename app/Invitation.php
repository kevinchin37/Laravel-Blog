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

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName() {
        return 'token';
    }
}
