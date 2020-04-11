<div class="col-md-{{ $widget['columns'] }}">
    <div class="widget latest-entries">
        <h2 class="widget-title">{{ $widget['title'] }}</h2>
        @if ($widget['categories']->isEmpty())
            @component('components.alerts.empty')
                @slot('message')
                    No categories to show.
                @endslot
            @endcomponent
        @endif

        <ul>
            @foreach ($widget['categories'] as $category)
                <li><a href="/admin/categories/{{ $category->slug }}/edit">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
