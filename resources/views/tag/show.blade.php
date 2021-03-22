@extends('layouts.master')

@section('pagetitle', $tagName)

@section('main_content')
    @component('components.posts.latest', [
        'post' => $posts->shift(),
        'headerTitle' => 'Latest'
    ])
    @endcomponent

    @component('components.posts.blocks', [
        'posts' => $posts,
        'headerTitle' => 'Older Posts'
    ])
    @endcomponent
@endsection
