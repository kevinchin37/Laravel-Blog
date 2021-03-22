<!DOCTYPE html>
    <html lang="en">
    <head>
        @include('layouts.head')
        @yield('head_content')
    </head>
    <body>
        <div id="app">
            @include('layouts.header')

            <div class="container">
                <div class="row">
                    @yield('main_content')
                </div>
            </div>

            <footer id="main-footer">
                @include('layouts.footer')
                @yield('footer_content')
            </footer>
        </div>

        <script src="/js/app.js"></script>
        @yield('extra_scripts')
    </body>
</html>
