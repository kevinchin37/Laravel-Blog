<div class="col-md-{{ $widget['columns'] }}">
    <div class="widget latest-entries">
        <h2 class="widget-title">{{ $widget['title'] }}</h2>
        @if ($widget['posts']->isEmpty())
            @component('admin.components.alerts.empty')
                @slot('message')
                    No posts to show.
                @endslot
            @endcomponent
        @endif

        <ul>
            @foreach ($widget['posts'] as $post)
                <li><a href="/admin/posts/{{ $post->slug }}/edit">{{ $post->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
