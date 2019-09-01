<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
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
                @yield('main_content')
            </div>
        </section>
    </body>
</html>
