<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.role.index', [
            'roles' => Role::whereNotIn('slug', ['owner'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $role = new Role;
        $attributes['slug'] = $role->getSlug($attributes['name']);

        $createdRole = $role->create($attributes);
        $createdRole->addPermissions(request('permissions'));

        return redirect('/admin/roles/' . $createdRole->slug . '/edit')
            ->with('status', 'Role has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role) {
        return view('admin.role.edit', [
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role) {
        $attributes = request()->validate([
            'name' => 'required',
        ]);

        if ($role->name !== $attributes['name']) {
            $attributes['slug'] = $role->getSlug($attributes['name']);
        }

        $role->updatePermissions(request('permissions'));
        $role->update($attributes);

        return redirect('/admin/roles/' . $role->slug . '/edit')
            ->with('status', 'Role has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role) {
        $role->delete();

        return back()->with('status', 'Role has been deleted.');
    }
}
