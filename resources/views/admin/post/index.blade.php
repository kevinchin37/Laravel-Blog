@extends('admin.layouts.table')

@section('header_title', 'Posts')

@section('header_links')
    @can('create', App\Post::class)
        <a class="btn btn-primary" href="/admin/posts/create">Create new Post</a>
    @endcan
@endsection

@section('table_header_columns')
    <th scope="col">ID</th>
    <th scope="col">Title</th>
    <th scope="col">Slug</th>
    <th scope="col">Categories</th>
    <th scope="col">Tags</th>
    <th scope="col">Action</th>
@endsection

@section('table_body')
    @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td><a href="/admin/posts/{{ $post->slug }}/edit">{{ $post->title }}</a></td>
            <td>{{ $post->slug }}</td>

            <td>
                @if ($post->categories->count())
                    @foreach ($post->categories as $category)
                        <a href="/admin/categories/{{ $category->slug }}">{{ $category->name }}</a>
                    @endforeach
                @endif
            </td>

            <td>
                @if ($post->tags->count())
                    @foreach ($post->tags as $tag)
                        <a href="/admin/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                    @endforeach
                @endif
            </td>

            <td>
                @can('delete', $post)
                    <form action="/admin/posts/{{ $post->slug }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endcan
            </td>
        </tr>
    @endforeach
@endsection
