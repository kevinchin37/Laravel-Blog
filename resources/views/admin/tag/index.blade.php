@extends('admin.layouts.master')

@section('header_title', 'Tags')

@section('header_links')
    <form action="/admin/tags" method="POST" class="form-inline">
        @csrf
        <div class="form-group">
            <label class="sr-only" for="new-tag">Tag</label>
            <input type="text" name="name" id="new-tag" class="mr-sm-2">
            <button type="submit" class="btn btn-primary">Add Tag</button>
        </div>
    </form>
@endsection

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tag ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Post Count</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">{{ $tag->id }}</th>
                            <td><a href="/admin/tags/{{ $tag->slug }}/edit">{{ $tag->name }}</a></td>
                            <td>{{ $tag->slug }}</td>
                            <td><a href="/admin/tags/{{ $tag->slug }}">{{ $tag->posts->count() }}</a></td>

                            <td>
                                <form action="/admin/tags/{{ $tag->slug }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
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