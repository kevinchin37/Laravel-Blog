@extends('admin.layouts.master')

@section('header_title', 'Posts')

@section('header_links')
    <a class="btn btn-outline-dark" href="/admin/posts/create">Create new Post</a>
@endsection

@section('main_content')
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>

                        <td {{ $post->categories->count() ? '' : 'colspan=2' }}>
                            <a href="/admin/posts/{{ $post->id }}/edit">{{ $post->title }}</a>
                        </td>

                        @if ($post->categories->count())
                            <td>
                                @foreach ($post->categories as $category)
                                    <a href="/admin/categories/{{ $category->id }}">{{ $category->name }}</a>
                                @endforeach
                            </td>
                        @endif

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
