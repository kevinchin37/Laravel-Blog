@extends('layouts.master')

@section('latest_post')
    @component('components.posts.latest', [
        'post' => $posts->first(),
        'headerTitle' => 'Latest'
    ])
    @endcomponent
@endsection

@section('more_posts')
    @component('components.posts.blocks', [
        'posts' => $posts->slice(1),
        'headerTitle' => 'Older Posts'
    ])
    @endcomponent
@endsection
