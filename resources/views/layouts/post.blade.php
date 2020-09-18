<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('pagetitle')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
    @if (!empty(env('TINY_MCE_KEY')))
        <script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_KEY') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    @endif
</head>
<body>
    <div id="app">
        @include('layouts.header')

        <div class="container">
            <div class="row">
                <div id="post-wrapper" class="col-md-9">
                    @yield('content')
                </div>

                <div class="col-md-3">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
