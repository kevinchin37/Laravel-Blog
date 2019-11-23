@extends('admin.layouts.master')

@section('header_title', 'Edit')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <form action="/admin/categories/{{ $category->slug }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Category name" value="{{ $category->name }}"/>
                </div>

                <button type="submit" class="btn btn-outline-dark mt-3">Update</button>
            </form>
        </div>
    </div>
@endsection
