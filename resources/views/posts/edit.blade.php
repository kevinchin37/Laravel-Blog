<form action="/posts/{{ $post->id }}" method="POST">
    @csrf
    @method('PATCH')
    <input type="text" name="title" value="{{ $post->title }}"/>
    <textarea id="" cols="30" rows="10" name="body">{{ $post->content }}</textarea>
    <button type="submit">Update</button>
</form>
