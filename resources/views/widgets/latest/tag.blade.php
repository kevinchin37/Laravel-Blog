<div class="col-md-{{ $widget['columns'] }}">
    <div class="widget latest-entries">
        <h2 class="widget-title">{{ $widget['title'] }}</h2>
        @if ($widget['tags']->isEmpty())
            @component('admin.components.alerts.empty')
                @slot('message')
                    No tags to show.
                @endslot
            @endcomponent
        @endif

        <ul>
            @foreach ($widget['tags'] as $tag)
                <li><a href="/admin/tags/{{ $tag->slug }}/edit">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
