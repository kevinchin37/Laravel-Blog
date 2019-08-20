<a href="/admin/posts/create/">Create New Post</a>

<ul>
@foreach ($posts as $post)
    <li>
        <a href="/admin/posts/{{ $post->id }}">{{ $post->title }}</a> -
        <a href="/admin/posts/{{ $post->id }}/edit/">Edit</a>
        <form action="/admin/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>
