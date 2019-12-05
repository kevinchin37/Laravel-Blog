@extends('admin.layouts.master')

@section('header_title', 'Edit')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <form action="/admin/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Username" value="{{ $user->name }}"/>
                </div>

                <div class="form-group">
                    <h4>Role</h4>
                    <select name="role_id">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ ($user->role->id == $role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-dark mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection
