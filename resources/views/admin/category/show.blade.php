@extends('admin.layouts.table')

@section('header_title', $category->name)

@section('table_header_columns')
    <th scope="col">Post ID</th>
    <th scope="col">Title</th>
    <th scope="col">Action</th>
@endsection

@section('table_body')
    @foreach ($category->posts as $post)
    <tr>
        <th scope="row">{{ $post->id }}</th>
        <td><a href="/admin/posts/{{ $post->slug }}/edit">{{ $post->title }}</a></td>
        <td>
            <form action="/admin/posts/{{ $post->slug }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
@endsection
