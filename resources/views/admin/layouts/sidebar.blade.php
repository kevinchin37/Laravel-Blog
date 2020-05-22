<div class="user-profile my-4">
    <div class="avatar"
        style="background: url({{ !empty($user->avatar) ? asset('storage/' . $user->avatar) : asset('images/placeholders/default-avatar.jpg') }}) center / cover no-repeat;">
    </div>

    <div class="options">
        <span>Hi {{ $user->name }}</span>
        <a class="edit" href="/admin/user/{{ $user->id }}/profile/edit">Edit Profile</a>
    </div>
</div>

{{-- @TODO add submenus later --}}
<div class="list-group list-group-flush">
    {{-- Update with named routes later --}}
    <a class="list-group-item {{ (request()->is('admin/dashboard') || request()->is('admin')) ? 'active' : '' }}" href="/admin">
        <span class="title">Dashboard</span>
    </a>

    <a class="list-group-item {{ (request()->is('admin/posts*')) ? 'active' : '' }}" href="/admin/posts">
        <span class="title">Posts</span>
    </a>

    <a class="list-group-item {{ (request()->is('admin/categories*')) ? 'active' : '' }}" href="/admin/categories">
        <span class="title">Categories</span>
    </a>

    <a class="list-group-item {{ (request()->is('admin/tags*')) ? 'active' : '' }}" href="/admin/tags">
        <span class="title">Tags</span>
    </a>

    <a class="list-group-item {{ (request()->is('admin/user*')) ? 'active' : '' }}" href="/admin/users">
        <span class="title">Users</span>
    </a>

    <a class="list-group-item {{ (request()->is('admin/invitations*')) ? 'active' : '' }}" href="/admin/invitations">
        <span class="title">Invitations</span>
    </a>

    <a class="list-group-item {{ (request()->is('admin/roles*')) ? 'active' : '' }}" href="/admin/roles">
        <span class="title">Roles</span>
    </a>
    @yield('sidebar_items')
</div>
