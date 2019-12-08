@extends('admin.layouts.table')

@section('header_title', 'Tags')

@section('header_links')
    @can('create', App\Tag::class)
        <form action="/admin/tags" method="POST" class="form-inline">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="mr-sm-2">
                <button type="submit" class="btn btn-primary">Add Tag</button>
            </div>
        </form>
    @endcan
@endsection

@section('table_header_columns')
    <th scope="col">Tag ID</th>
    <th scope="col">Name</th>
    <th scope="col">Slug</th>
    <th scope="col">Post Count</th>
    <th scope="col">Action</th>
@endsection

@section('table_body')
    @foreach ($tags as $tag)
    <tr>
        <th scope="row">{{ $tag->id }}</th>
        <td><a href="/admin/tags/{{ $tag->slug }}/edit">{{ $tag->name }}</a></td>
        <td>{{ $tag->slug }}</td>
        <td><a href="/admin/tags/{{ $tag->slug }}">{{ $tag->posts->count() }}</a></td>

        <td>
            @can('delete', App\Tag::class)
                <form action="/admin/tags/{{ $tag->slug }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan
        </td>
    </tr>
    @endforeach
@endsection
