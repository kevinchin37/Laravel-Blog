@extends('admin.layouts.table')

@section('header_title', $category->name . ' Posts')

@section('table_header_columns')
    @if ($category->posts->isEmpty())
        @component('components.alerts.empty')
            @slot('message')
                No posts to show.
            @endslot
        @endcomponent
    @else
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Actions</th>
    @endif
@endsection

@section('table_body')
    @foreach ($categoryPosts as $post)
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

            @can('delete', App\Category::class)
                <form action="/admin/posts/{{ $post->slug }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            @endcan
        </td>
    </tr>
    @endforeach
@endsection

@section('pagination_links')
    {{ $categoryPosts->links() }}
@endsection
