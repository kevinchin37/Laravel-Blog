@extends('admin.layouts.table')

@section('header_title', $tag->name . ' Posts')

@section('table_header_columns')
    <th scope="col">ID</th>
    <th scope="col">Title</th>
    <th scope="col">Actions</th>
@endsection

@section('table_body')
    @foreach ($tagPosts as $post)
    <tr>
        <th scope="row">{{ $post->id }}</th>
        <td><a href="/admin/posts/{{ $post->slug }}/edit">{{ $post->title }}</a></td>

        <td class="actions">
            @include('admin.layouts.parts.buttons', [
                'editUrl' => '/admin/posts/' . $post->slug . '/edit',
                'viewUrl' => '/post/' . $post->slug,
            ])

            <form action="/admin/posts/{{ $post->slug }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
@endsection

@section('pagination_links')
    {{ $tagPosts->links() }}
@endsection

