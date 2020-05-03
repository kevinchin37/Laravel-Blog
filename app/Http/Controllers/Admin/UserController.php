<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.user.index', [
            'users' => User::whereNotIn('role_id', [Role::OWNER_ROLE_ID])->with('role')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {
        return view('admin.user.edit', [
            'user' => $user,
            'roles' => Role::all(),
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
            'role_id' => 'required',
        ]);

        $user->update($attributes);

        return back()->with('status', 'User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $this->delete($user);

        return back()->with('status', 'User has been deleted.');
    }
}
