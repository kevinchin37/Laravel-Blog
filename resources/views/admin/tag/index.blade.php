@extends('admin.layouts.table')

@section('header_title', 'Tags')

@section('header_links')
    @can('create', App\Tag::class)
        <form action="/admin/tags" method="POST" class="form-inline">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control mr-sm-2">
                <button type="submit" class="btn btn-primary">Add Tag</button>
            </div>
        </form>
    @endcan
@endsection

@section('table_header_columns')
    @if ($tags->isEmpty())
        @component('admin.components.alerts.empty')
            @slot('message')
                No Tags to show.
            @endslot
        @endcomponent
    @else
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Slug</th>
        <th scope="col">Post Count</th>
        <th scope="col">Actions</th>
    @endif
@endsection

@section('table_body')
    @foreach ($tags as $tag)
    <tr>
        <th scope="row">{{ $tag->id }}</th>
        <td><a href="/admin/tags/{{ $tag->slug }}/edit">{{ $tag->name }}</a></td>
        <td>{{ $tag->slug }}</td>
        <td><a href="/admin/tags/{{ $tag->slug }}">{{ $tag->posts->count() }}</a></td>

        <td class="actions">
            @component('admin.components.buttons.edit', [
                'url' => '/admin/tags/' . $tag->slug . '/edit'
            ]) @endcomponent

            @component('admin.components.buttons.view', [
                'url' => '/tag/' . $tag->slug
            ]) @endcomponent

            @can('delete', App\Tag::class)
                <form action="/admin/tags/{{ $tag->slug }}" method="POST">
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
    {{ $tags->links() }}
@endsection
