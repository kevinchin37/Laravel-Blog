<div class="col-md-{{ $widget['columns'] }}">
    <div class="widget">
        <h2 class="widget-title">{{ $widget['title'] }}</h2>
        <table class="table table-sm">
            @if ($widget['activities']->isEmpty())
                @component('admin.components.alerts.empty')
                    @slot('message')
                        No recent activities.
                    @endslot
                @endcomponent
            @else
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Log</th>
                        <th scope="col">Model</th>
                        <th scope="col">Type</th>
                        <th scope="col">Message</th>
                        <th scope="col">Source</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
            @endif

            <tbody>
                @foreach ($widget['activities'] as $activity)
                    <tr>
                        <th scope="row">{{ $activity->id }}</th>
                        <td class="text-success">{{ $activity->loggable_type }}</td>
                        <td>{{ $activity->type }}</td>
                        <td><span class="text-primary">{{ '[ID: ' . $activity->loggable_id . ']' }}</span> {{ $activity->message }}</td>
                        <td>{{ $activity->author->name }}</td>
                        <td>{{ $activity->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
