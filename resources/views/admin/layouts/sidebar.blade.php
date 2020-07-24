<div class="user-profile my-4">
    <div class="avatar" style="background: url('{{ asset($user->avatar) }}') center / cover no-repeat;"></div>
    <div class="control-panel">
        <span>Hi {{ $user->name }}</span>
        <div class="options">
            <a class="option edit" href="/admin/user/{{ $user->id }}/profile/edit">Edit Profile</a>
            <a class="option log-out" href="{{ url('logout') }}"> Log Out </a>
        </div>
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
