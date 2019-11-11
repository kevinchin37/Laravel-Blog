@extends('admin.layouts.master')

@section('header_title', 'Categories')

@section('header_links')
    <form action="/admin/categories" method="POST" class="form-inline">
        @csrf
        <div class="form-group">
            <label class="sr-only" for="new-category">Category</label>
            <input type="text" name="name" id="new-category" class="mr-sm-2">
            <button type="submit" class="btn btn-primary">Add Category</button>
        </div>
    </form>
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
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td><a href="/admin/categories/{{ $category->id }}/edit">{{ $category->name }}</a></td>
                            <td><a href="/admin/categories/{{ $category->id }}/edit">{{ $category->slug }}</a></td>
                            <td><a href="/admin/categories/{{ $category->id }}">{{ $category->posts->count() }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
