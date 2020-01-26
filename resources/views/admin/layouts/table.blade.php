@extends('admin.layouts.master')

@section('main_content')
    @include('admin.layouts.search')

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        @yield('table_header_columns')
                    </tr>
                </thead>

                <tbody class="model-data">
                    @yield('table_body')
                </tbody>
            </table>
        </div>
        @yield('pagination_links')
    </div>
@endsection
