@extends('admin.layouts.master')

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

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Post Count</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td><a href="/admin/categories/{{ $category->slug }}/edit">{{ $category->name }}</a></td>
                            <td>{{ $category->slug }}</td>
                            <td><a href="/admin/categories/{{ $category->slug }}">{{ $category->posts->count() }}</a></td>

                            <td>
                                @can('delete', $category)
                                    <form action="/admin/categories/{{ $category->slug }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection
