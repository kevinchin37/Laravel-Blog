@extends('admin.layouts.table')

@section('header_title', 'Users')

@section('table_header_columns')
    <th scope="col">User ID</th>
    <th scope="col">Name</th>
    <th scope="col">Action</th>
@endsection

@section('table_body')
    @foreach ($users as $user)
    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td><a href="/admin/users/{{ $user->id }}/edit">{{ $user->name }}</a></td>

        <td>
            <form action="/admin/users/{{ $user->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
