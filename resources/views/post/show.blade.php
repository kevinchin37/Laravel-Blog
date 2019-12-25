@extends('layouts.post')

@section('pagetitle', $post->title)

@section('content')
    @component('components.posts.details', ['post' => $post])
    @endcomponent
@endsection
