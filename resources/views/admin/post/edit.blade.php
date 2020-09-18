@extends('admin.layouts.master')

@section('header_title', 'Edit')

@section('main_content')
    <div class="row post-edit-wrapper">
        <div class="col-md-12">
            <form action="/admin/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" id="post-title" class="form-control" name="title" placeholder="Enter Post Title" value="{{ $post->title }}"/>
                </div>

                <div class="form-group">
                    <tinymce-editor value="{{ $post->body }}"></tinymce-editor>
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
                            <li><strong>ID:</strong> {{ $post->id }}</li>
                            <li><strong>Slug:</strong> {{ $post->slug }}</li>
                            <li><strong>Link:</strong> <a href="/post/{{ $post->slug }}">{{ url('post/' . $post->slug) }}</a></li>
                            <li><strong>Author:</strong> {{ $post->author->name }}</li>
                            <li><strong>Published Date:</strong> {{ $post->created_at }}</li>
                            <li><strong>Last Modified:</strong> {{ $post->updated_at }}</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Select Categories</h4>
                            <ul class="list-group taxonomy-wrapper {{ (count($categories) > 5 ? 'scroll-enable' : '') }}">
                                @foreach ($post->categories as $postCategory)
                                <label>
                                    <li class="list-group-item"><input type="checkbox" id='category-name' name="categories[]" value="{{ $postCategory->id }}" checked>{{$postCategory->name}}</li>
                                </label>
                                @endforeach

                                @foreach ($categories->diff($post->categories) as $category)
                                    <label>
                                        <li class="list-group-item"><input type="checkbox" name="categories[]" value="{{ $category->id }}">{{ $category->name }}</li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <h4>Select tags</h4>
                            <ul class="list-group taxonomy-wrapper {{ (count($tags) > 5 ? 'scroll-enable' : '') }}">
                                @foreach ($post->tags as $postTag)
                                    <label>
                                        <li class="list-group-item"><input type="checkbox" name="tags[]" value="{{ $postTag->id }}" checked>{{ $postTag->name }}</li>
                                    </label>
                                @endforeach

                                @foreach ($tags->diff($post->tags) as $tag)
                                    <label>
                                        <li class="list-group-item"><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}</li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                @can('update', $post)
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                @endcan
            </form>
        </div>
    </div>
@endsection
