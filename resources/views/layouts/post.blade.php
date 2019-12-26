<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('pagetitle')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <section>
        @include('layouts.header')

        <div class="container">
            <div class="row">
                <div id="post-detail" class="col-md-9">
                    @yield('content')
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
