@extends('admin.layouts.master')

@section('main_content')
    @include('widgets.index', ['widgets' => $widgets])
@endsection
