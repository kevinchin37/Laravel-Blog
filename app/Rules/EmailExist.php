<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class EmailExist implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        return User::where('email', $value)->get()->isEmpty();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'The email is already taken.';
    }
}
