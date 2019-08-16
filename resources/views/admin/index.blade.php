<ul>
@foreach ($posts as $post)
    <li><a href="/admin/posts/{{ $post->id }}">{{ $post->title }}</a></li>
@endforeach
</ul>
