@extends('admin.layouts.master')

@section('header_title', 'Edit')

@section('main_content')
    <form action="/admin/posts/{{ $post->id }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <input type="text" id="post-title" class="form-control" name="title" placeholder="Enter Post Title" value="{{ $post->title }}"/>
        </div>

        <div class="form-group row">
            <textarea id="post-body" class="form-control" cols="30" rows="10" name="body">{{ $post->body }}</textarea>
        </div>

        <div class="form-group row">
            <select class="form-control" name="category">
                <option value="" selected> -- Select a Category -- </option>
                @foreach ($categories as $category)
                    @if ($post->categories->count())
                        @foreach ($post->categories as $post_category)
                            <option value="{{ $category->id }}" {{ ($post_category->id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="row"><button type="submit" class="btn btn-outline-dark">Update</button></div>
    </form>
@endsection
