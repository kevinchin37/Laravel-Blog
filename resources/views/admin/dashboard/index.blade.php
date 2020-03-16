@extends('admin.layouts.master')

@section('main_content')
    <div class="row">
        @foreach ($widgets as $widget)
            @component($widget['template'], ['widget' => $widget])
            @endcomponent
        @endforeach
    </div>
@endsection
