<form action="/posts/" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Post title"/><br/><br/>
    <textarea id="" cols="30" rows="10" name="body"></textarea><br/><br/>
    <button type="submit">Publish</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
