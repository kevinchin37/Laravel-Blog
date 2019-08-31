@extends('admin.layouts.master')

@section('header_title', 'New Post')

@section('main_content')
    <form action="/admin/posts/" method="POST">
        @csrf
        <div class="form-group row">
            <input type="text" id="post-title" class="form-control" name="title" placeholder="Enter Post Title"/>
        </div>

        <div class="form-group row">
            <textarea id="" class="form-control" cols="30" rows="10" name="body"></textarea>
        </div>

        <div class="form-group row">
            <select class="form-control" name="category">
                <option disabled selected value> -- Select a Category -- </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row"><a class="btn btn-outline-dark" href="#">Create new Post</a></div>
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
