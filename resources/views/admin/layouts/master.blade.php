<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Admin</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css" >
    </head>
    <body>
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
    </body>
</html>
