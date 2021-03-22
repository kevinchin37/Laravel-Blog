<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user
        ]);
    }
}
