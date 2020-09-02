<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit() {
        return view('admin.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user) {
        $attributes = request()->validate([
            'name' => 'required|min:5|max:15',
            'avatar' => 'nullable|image|max:1500',
            'email' => 'unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        if (!empty($attributes['avatar'])) {
            Storage::disk('public')->delete($user->avatar);
            $attributes['avatar'] = resizeAndStoreImage($attributes['avatar'], [
                'prefix' => 'avatar',
                'path' => '/uploads/avatars/' . $user->id,
            ]);
        }

        if (!empty($attributes['password'])) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        $user->update($attributes);

        return back()->with('status', 'Profile has been updated.');
    }
}
