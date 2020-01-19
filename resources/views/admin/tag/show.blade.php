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
            @component('admin.components.buttons.edit', [
                'url' => '/admin/posts/' . $post->slug . '/edit'
            ]) @endcomponent

            @component('admin.components.buttons.view', [
                'url' => '/post/' . $post->slug
            ]) @endcomponent

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

