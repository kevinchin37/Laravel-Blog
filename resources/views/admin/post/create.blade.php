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
                    <textarea id="" class="form-control" cols="30" rows="10" name="body"></textarea>
                </div>

                <div class="form-group ">
                    <select class="form-control" name="category">
                        <option disabled selected value> -- Select a Category -- </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group ">
                    <label for="featured-image">Featured Image</label>
                    <input type="file" id="featured-image" name="featured_image">
                </div> --}}

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="featured-image" name="featured_image">
                        <label class="custom-file-label" for="featured-image">Choose file</label>
                    </div>
                </div>

                <div class=""><button type="submit" class="btn btn-primary">Create Post</button></div>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
