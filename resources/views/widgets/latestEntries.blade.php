<div class="col-md-{{ $widget['columns'] }}">
    <div class="widget latest-post">
        <h2 class="widget-title">{{ $widget['title'] }}</h2>
        @if ($widget['entries']->isEmpty())
            @component('admin.components.alerts.empty')
                @slot('message')
                    No posts to show.
                @endslot
            @endcomponent
        @endif

        <ul class="post-list">
            @foreach ($widget['entries'] as $entry)
                <li>{{ (!empty($entry->title)) ? $entry->title : $entry->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
