@extends('admin.layouts.master')

@section('header_title', 'Invite')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <form action="/admin/invitations" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user-email">E-mail</label>
                    <input type="email" id="user-email" class="form-control w-25" name="email" placeholder="person@email.com"/>
                </div>

                <div class="form-group">
                    <label for="user-role">Role</label>
                    <select id="user-role" class="form-control w-25" name="role_id">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Send</button>
            </form>
        </div>
    </div>
@endsection
