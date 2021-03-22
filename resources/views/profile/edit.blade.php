@extends('layouts.master')

@section('main_content')
    <div class="row post-edit-wrapper col-md-12">
        <h1>Edit Profile</h1>
        <div class="col-md-12">
            <form action="/user/{{ $user->id }}/profile" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="user-name">Name</label>
                    <input id="user-name" class="form-control w-50" type="text" name="name" value="{{ $user->name }}"/>
                </div>

                <div class="form-group">
                    <label for="user-email">Email</label>
                    <input id="user-email" class="form-control w-50" type="email" name="email" value="{{ $user->email }}"/>
                </div>

                <div class="form-group">
                    <label for="user-new-password">New Password</label>
                    <input id="user-new-password" class="form-control w-50" type="password" name="password" value=""/>
                </div>

                <div class="form-group">
                    <label for="user-confirm-password">Confirm Password</label>
                    <input id="user-confirm-password" class="form-control w-50" type="password" name="password_confirmation" value=""/>
                </div>

                <avatar-uploader title="Upload Avatar"
                    :user="{{ $user }}"
                    avatar="{{ $user->avatar }}">
                </avatar-uploader>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
