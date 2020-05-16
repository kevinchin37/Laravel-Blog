<div class="user-profile my-4">
    <div class="avatar" style="background: url({{ asset('storage/' . $user->avatar) }}) no-repeat; background-size: cover;"></div>
    <div class="options">
        <span>Hi {{ $user->name }}</span>
        <div><a href="/admin/user/{{ $user->id }}/profile/edit">Edit Profile</a></div>
    </div>
</div>

{{-- @TODO add submenus later --}}
<div class="list-group list-group-flush">
    <a class="list-group-item" href="/admin">Dashboard</a>
    <a class="list-group-item" href="/admin/posts">Posts</a>
    <a class="list-group-item" href="/admin/categories">Categories</a>
    <a class="list-group-item" href="/admin/tags">Tags</a>
    <a class="list-group-item" href="/admin/users">Users</a>
    <a class="list-group-item" href="/admin/invitations">Invitations</a>
    <a class="list-group-item" href="/admin/roles">Roles</a>
    @yield('sidebar_items')
</div>
