<a href="/admin/categories/create">Add a Category</a>

<ul>
    @foreach ($categories as $category)
        <li><a href="/admin/categories/{{ $category->id }}">{{ $category->name }}</a></li>
    @endforeach
</ul>
