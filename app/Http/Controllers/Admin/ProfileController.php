<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {
        return view('admin.profile.edit', [
            'user' => $user,
        ]);
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
            'name' => 'required',
            'avatar' => 'nullable|image|max:1500',
            'email' => 'unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        if (!empty($attributes['avatar'])) {
            $avatar = Image::make($attributes['avatar']);
            $avatar->resize(400,400, function ($constraint) {
                $constraint->aspectRatio();
            });

            $filename = 'avatar' . '.' . ($attributes['avatar'])->extension();
            $attributes['avatar'] = $filepath = '/uploads/avatars/' . $user->id . '/' . $filename;

            $avatar->save(public_path('storage') . $filepath);
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
