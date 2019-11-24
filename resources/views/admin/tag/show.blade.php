@extends('admin.layouts.master')

@section('header_title', $tag->name)

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Post ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($tag->posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td><a href="/admin/posts/{{ $post->slug }}/edit">{{ $post->title }}</a></td>
                            <td>
                                <form action="/admin/posts/{{ $post->slug }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

