@extends('admin.layouts.master')

@section('main_content')
    <div class="row">
        <div class="col-md-4">
            <div class="widget latest-post">
                <h2 class="widget-title">Latest Posts</h2>
                @if ($posts->isEmpty())
                    @component('admin.components.alerts.empty')
                        @slot('message')
                            No posts to show.
                        @endslot
                    @endcomponent
                @endif

                <ul class="post-list">
                    @foreach ($posts as $post)
                        <li><a href="/admin/posts/{{ $post->slug }}/edit">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-8">
            <div class="widget">
                <h2 class="widget-title">Activities</h2>
                <table class="table table-sm">
                    @if ($activities->isEmpty())
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

                    <tbody class="model-data">
                        @foreach ($activities as $activity)
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
    </div>
@endsection
