@extends('layouts.post')

@section('pagetitle', $post->title)

@section('content')
    @component('components.posts.details', ['post' => $post])
    @endcomponent

    @component('components.posts.blocks', [
        'posts' => $post->author->posts->slice(1)->shuffle()->take(3),
        'headerTitle' => 'More Posts By '. $post->author->name
    ])
    @endcomponent
@endsection
