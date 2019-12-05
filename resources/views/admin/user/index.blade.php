@extends('admin.layouts.master')

@section('header_title', 'Users')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        {{-- <th scope="col">Post Count</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td><a href="/admin/users/{{ $user->id }}/edit">{{ $user->name }}</a></td>

                            {{-- <td><a href="/admin/users/{{ $user->slug }}">{{ $user->posts->count() }}</a></td> --}}

                            <td>
                                <form action="/admin/users/{{ $user->id }}" method="POST">
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
