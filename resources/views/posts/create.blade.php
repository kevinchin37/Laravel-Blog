<form action="/posts/" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Post title"/>
    <textarea id="" cols="30" rows="10" name="content"></textarea>
    <button type="submit">Publish</button>
</form>
