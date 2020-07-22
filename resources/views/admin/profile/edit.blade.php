@extends('admin.layouts.master')

@section('header_title', 'Edit Profile')

@section('main_content')
    <div class="row post-edit-wrapper">
        <div class="col-md-12">
            <form action="/admin/user/{{ $user->id }}/profile" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="user-name">Name</label>
                    <input id="user-name" class="form-control w-25" type="text" name="name" value="{{ $user->name }}"/>
                </div>

                <div class="form-group">
                    <label for="user-email">Email</label>
                    <input id="user-name" class="form-control w-25" type="email" name="email" value="{{ $user->email }}"/>
                </div>

                <div class="form-group">
                    <label for="user-new-password">New Password</label>
                    <input id="user-new-password" class="form-control w-25" type="password" name="password" value=""/>
                </div>

                <div class="form-group">
                    <label for="user-password">Confirm Password</label>
                    <input id="user-password" class="form-control w-25" type="password" name="password_confirmation" value=""/>
                </div>

                <div class="user-avatar" style="background: #f5f5f5; padding: 25px 15px">
                    <div class="form-group">
                        <h5>Avatar</h5>
                        <div class="custom-file w-50">
                            <input type="file" class="custom-file-input" id="avatar" name="avatar">
                            <label class="custom-file-label" for="avatar">Select Image</label>
                        </div>
                    </div>

                    <div class="form-group">
                        @if (!empty($user->avatar))
                            <img class="img-thumbnail img-fluid" src="{{ asset( $user->avatar ) }}" alt="">
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
