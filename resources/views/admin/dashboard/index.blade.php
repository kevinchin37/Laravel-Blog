@extends('admin.layouts.master')

@section('main_content')
    <div class="row">
        <div class="col-md-4">
            <div class="widget latest-post">
                <h2 class="widget-title">Latest Posts</h2>
                <ul class="post-list">
                    @foreach ($posts as $post)
                        <li><a href="/admin/posts/{{ $post->slug }}/edit">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-8">
            <div class="widget">
                <h2 class="widget-title">Activity</h2>
                <table class="table table-sm">
                    @component('admin.components.table.head', [
                        'columns' => [
                            'Log ID', 'Model', 'Item ID',
                            'Type', 'Message', 'Author', 'Date'
                        ]
                    ]) @endcomponent

                    @component('admin.components.table.body')
                        @slot('rows')
                            @foreach ($activities as $activity)
                                <tr>
                                    <th scope="row">{{ $activity->id }}</th>
                                    <td>{{ $activity->loggable_type }}</td>
                                    <td>{{ $activity->loggable_id }}</td>
                                    <td>{{ $activity->type }}</td>
                                    <td>{{ $activity->message }}</td>
                                    <td>{{ $activity->author->name }}</td>
                                    <td>{{ $activity->created_at }}</td>
                                </tr>
                            @endforeach
                        @endslot
                    @endcomponent
                </table>
            </div>
        </div>
    </div>
@endsection
