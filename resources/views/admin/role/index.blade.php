@extends('admin.layouts.table')

@section('header_title', 'Roles')

@section('table_header_columns')
    <th scope="col">Name</th>
    <th scope="col">Action</th>
@endsection

@section('table_body')
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>

                <td>
                    <form action="/admin/roles/{{ $role->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection
