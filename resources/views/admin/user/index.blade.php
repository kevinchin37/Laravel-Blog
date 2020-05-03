@extends('admin.layouts.table')

@section('header_title', 'Users')

@section('header_links')
        <a class="btn btn-primary" href="/admin/invitations">Invite</a>
@endsection

@section('table_header_columns')
    <th scope="col">ID</th>
    <th scope="col">Name</th>
    <th scope="col">Role</th>
    <th scope="col">Actions</th>
@endsection

@section('table_body')
    <tr>
        <th scope="row">1</th>
        <td>admin</td>
        <td>Owner</td>
    </tr>

    @foreach ($users as $user)
    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td><a href="/admin/users/{{ $user->id }}/edit">{{ $user->name }}</a></td>
        <td>{{ $user->role->name }}</td>

        <td class="actions">
            <form action="/admin/users/{{ $user->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
