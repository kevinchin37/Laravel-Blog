<div class="row">
    @foreach ($widgets as $widget)
        @include($widget['template'], ['widget' => $widget])
    @endforeach
</div>
