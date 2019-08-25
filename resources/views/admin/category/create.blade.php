<form action="/admin/categories" method="POST">
    @csrf
    <input type="text" name="name"/>
    <button type="submit">Add</button>
</form>

{{-- add errors later --}}
{{-- {{dd($errors->all())}} --}}
