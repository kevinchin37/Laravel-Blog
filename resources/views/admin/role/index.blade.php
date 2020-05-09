@extends('admin.layouts.table')

@section('header_title', 'Roles')

@section('header_links')
    @can('create', App\Post::class)
        <a class="btn btn-primary" href="/admin/roles/create">Create Role</a>
    @endcan
@endsection

@section('table_header_columns')
    <th scope="col">Name</th>
    <th scope="col">Actions</th>
@endsection

@section('table_body')
        @foreach ($defaults as $defaultRole)
            <tr>
                <td colspan="100%"><a href="/admin/roles/{{ $defaultRole->slug }}/edit">{{ $defaultRole->name }}</a></td>
            </tr>
        @endforeach

        @foreach ($roles as $role)
            <tr>
                <td><a href="/admin/roles/{{ $role->slug }}/edit">{{ $role->name }}</a></td>
                <td class="actions">
                    <form action="/admin/roles/{{ $role->slug }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
@endsection
