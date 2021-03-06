<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Admin</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css" >
        @if (!empty(env('TINY_MCE_KEY')))
            <script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_KEY') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        @endif
    </head>
    <body>
        <div id="app">
            <div class="sidebar">
                @include('admin.layouts.sidebar')
            </div>

            <section class="main-admin-panel">
                <div class="container">
                    @include('admin.layouts.header')
                    @yield('search_bar')
                    @yield('main_content')
                </div>
            </section>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
