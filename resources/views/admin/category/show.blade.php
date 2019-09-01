@extends('admin.layouts.master')

@section('header_title', $category->name)

@section('main_content')
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Post ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($category->posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td><a href="/admin/posts/{{ $post->id }}/edit">{{ $post->title }}</a></td>
                        <td>
                            <form action="/admin/posts/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

