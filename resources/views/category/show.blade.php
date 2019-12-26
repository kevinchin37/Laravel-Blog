@extends('layouts.master')

@section('pagetitle', $categoryName)

@section('latest_post')
    @component('components.posts.latest', [
        'post' => $posts->shift(),
        'headerTitle' => 'Latest'
    ])
    @endcomponent
@endsection

@section('more_posts')
    @component('components.posts.blocks', [
        'posts' => $posts,
        'headerTitle' => 'Older Posts'
    ])
    @endcomponent
@endsection
