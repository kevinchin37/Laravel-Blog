
@if ($category->posts->count())
    <ul>
        @foreach ($category->posts as $post)
            <li><a href="/admin/posts/{{ $post->id }}/edit">{{ $post->title }}</a></li>
        @endforeach
    </ul>
@endif
