<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('pagetitle', 'Home')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <section>
        @include('layouts.header')

        <div class="container">
            @yield('latest_post')

            <div class="row">
                <div class="col-md-9">
                    @yield('more_posts')
                </div>

                <div class="col-md-3">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
</body>
</html>
