@extends('admin.layouts.table')

@section('header_title', 'Roles')

@section('header_links')
    <a class="btn btn-primary" href="/admin/roles/create">Create Role</a>
@endsection

@section('table_header_columns')
    <th scope="col">Name</th>
    <th scope="col">Actions</th>
@endsection

@section('table_body')
        @foreach ($defaults as $defaultRole)
            <tr>
                <td><a href="/admin/roles/{{ $defaultRole->slug }}/edit">{{ $defaultRole->name }}</a></td>
                <td class="actions">
                    @component('admin.components.buttons.edit', [
                        'url' => '/admin/roles/' . $defaultRole->slug . '/edit'
                    ]) @endcomponent
                </td>
            </tr>
        @endforeach

        @foreach ($roles as $role)
            <tr>
                <td><a href="/admin/roles/{{ $role->slug }}/edit">{{ $role->name }}</a></td>
                <td class="actions">
                    @component('admin.components.buttons.edit', [
                        'url' => '/admin/roles/' . $role->slug . '/edit'
                    ]) @endcomponent

                    <form action="/admin/roles/{{ $role->slug }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
@endsection
