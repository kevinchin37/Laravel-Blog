@extends('layouts.master')

@section('head_content')
    @if (!empty(env('TINY_MCE_KEY')))
        <script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_KEY') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    @endif

    <meta name="isLoggedIn" content="{{ Auth::check() }}">
@endsection

@section('main_content')
    <div id="post-wrapper" class="col-md-9">
        @yield('content')
    </div>

    <div class="col-md-3">
        @include('layouts.sidebar')
    </div>
@endsection
