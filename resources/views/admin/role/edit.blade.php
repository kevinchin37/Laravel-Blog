<form action="admin/roles/{{ $role->id }}" method="POST">
    @foreach ($role->permissions as $permission)
        <input type="checkbox"/>{{ $permission->name }} <br/>
    @endforeach
</form>
