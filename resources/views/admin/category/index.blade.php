@extends('admin.layouts.table')

@section('header_title', 'Categories')

@section('header_links')
    @can('create', App\Category::class)
        <form action="/admin/categories" method="POST" class="form-inline">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="mr-sm-2">
                <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
        </form>
    @endcan
@endsection

@section('table_header_columns')
    @if ($categories->isEmpty())
        @component('admin.components.alerts.empty')
            @slot('message')
                No categories to show.
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
    @foreach ($categories as $category)
    <tr>
        <th scope="row">{{ $category->id }}</th>
        <td><a href="/admin/categories/{{ $category->slug }}/edit">{{ $category->name }}</a></td>
        <td>{{ $category->slug }}</td>
        <td><a href="/admin/categories/{{ $category->slug }}">{{ $category->posts->count() }}</a></td>

        <td class="actions">
            @component('admin.components.buttons.edit', [
                'url' => '/admin/categories/' . $category->slug . '/edit'
            ]) @endcomponent

            @component('admin.components.buttons.view', [
                'url' => '/category/' . $category->slug
            ]) @endcomponent

            @can('delete', App\Category::class)
                <form action="/admin/categories/{{ $category->slug }}" method="POST">
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
    {{ $categories->links() }}
@endsection
