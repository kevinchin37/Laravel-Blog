@extends('admin.layouts.master')

@section('header_title', 'New Post')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <form action="/admin/posts/" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">
                    <input type="text" id="post-title" class="form-control" name="title" placeholder="Enter Post Title"/>
                </div>

                <div class="form-group ">
                    @component('admin.components.editor.tinymce', ['selector' => 'textarea#post-body'])
                        <textarea id="post-body" class="form-control" cols="30" rows="10" name="body"></textarea>
                    @endcomponent
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Select Categories</h4>
                            <ul class="list-group taxonomy-wrapper {{ (count($categories) > 5 ? 'scroll-enable' : '') }}">
                                @foreach ($categories as $category)
                                    <label>
                                        <li class="list-group-item"><input type="checkbox" name="categories[]" value="{{ $category->id }}">{{ $category->name }}</li>
                                    </label>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <h4>Select Tags</h4>
                            <ul class="list-group taxonomy-wrapper {{ (count($tags) > 5 ? 'scroll-enable' : '') }}">
                                @foreach ($tags as $tag)
                                <label>
                                    <li class="list-group-item"><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}</li>
                                </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="featured-image" name="featured_image">
                        <label class="custom-file-label" for="featured-image">Choose file</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>
@endsection
