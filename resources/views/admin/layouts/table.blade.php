@extends('admin.layouts.master')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        @yield('table_header_columns')
                    </tr>
                </thead>

                <tbody>
                    @yield('table_body')
                </tbody>
            </table>
        </div>
    </div>
@endsection
