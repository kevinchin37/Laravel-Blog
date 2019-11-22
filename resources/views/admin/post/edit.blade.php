@extends('admin.layouts.master')

@section('header_title', 'Edit')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <form action="/admin/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" id="post-title" class="form-control" name="title" placeholder="Enter Post Title" value="{{ $post->title }}"/>
                </div>

                <div class="form-group">
                    <textarea id="post-body" class="form-control" cols="30" rows="10" name="body">{{ $post->body }}</textarea>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for="featured-image">Update Image</label>
                        <input type="file" id="featured-image" name="featured_image">

                        @if (!empty($post->featured_image))
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage/' . $post->featured_image ) }}" alt="">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <ul>
                            <li>Post ID: {{ $post->id }}</li>
                            <li>Post Slug: {{ $post->slug }}</li>
                            <li>Published Date: {{ $post->created_at }}</li>
                            <li>Last Modified: {{ $post->updated_at }}</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Select Categories</h4>
                            <ul class="list-group taxonomy-wrapper {{ (count($categories) > 5 ? 'scroll-enable' : '') }}">
                                @foreach ($post->categories as $postCategory)
                                    <li class="list-group-item"><input type="checkbox" name="category[]" value="{{$postCategory->id}}" checked>{{$postCategory->name}}</li>
                                @endforeach

                                @foreach ($categories->diff($post->categories) as $category)
                                    <li class="list-group-item"><input type="checkbox" name="category[]" value="{{$category->id}}">{{$category->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-dark mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection
