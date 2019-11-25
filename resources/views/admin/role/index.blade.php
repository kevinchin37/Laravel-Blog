@extends('admin.layouts.master')

@section('header_title', 'Roles')

@section('header_links')
    <form action="/admin/roles" method="POST" class="form-inline">
        @csrf
        <div class="form-group">
            <label class="sr-only" for="new-role">Role</label>
            <input type="text" name="name" id="new-role" class="mr-sm-2">
            <button type="submit" class="btn btn-primary">Add Role</button>
        </div>
    </form>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td><a href="/admin/roles/{{ $role->id }}/edit">{{ $role->name }}</a></td>
                            <td>
                                <form action="/admin/roles/{{ $role->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
