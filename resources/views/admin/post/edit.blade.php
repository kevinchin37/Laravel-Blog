@extends('admin.layouts.master')

@section('header_title', 'Edit')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" id="post-title" class="form-control" name="title" placeholder="Enter Post Title" value="{{ $post->title }}"/>
                </div>

                <div class="form-group">
                    <textarea id="post-body" class="form-control" cols="30" rows="10" name="body">{{ $post->body }}</textarea>
                </div>

                <div class="form-group">
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

                @if ($post->featured_image)
                    <img class="img-thumbnail" src="{{ asset('storage/' . $post->featured_image ) }}" alt="">
                @endif

                <div class="form-group">
                    <label for="featured-image">Update Featured Image</label>
                    <input type="file" id="featured-image" name="featured_image">
                </div>

                <div class="row"><button type="submit" class="btn btn-outline-dark">Update</button></div>
            </form>
        </div>
    </div>
@endsection
