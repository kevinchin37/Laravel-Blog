<form action="/admin/posts/" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Post title"/><br/><br/>
    <textarea id="" cols="30" rows="10" name="body"></textarea><br/><br/>

    <select name="category">
        <option disabled selected value> -- Select a Category -- </option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <button type="submit">Publish</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
