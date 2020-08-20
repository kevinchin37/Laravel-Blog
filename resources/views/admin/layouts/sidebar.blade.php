<profile-card
    :user="{ id: '{{ $user->id }}', name: '{{ $user->name }}' }"
    :avatar="{ filename: '{{ $user->avatar }}', filepath: '{{ asset( 'storage' . $user->avatar ) }}' }"
></profile-card>

{{-- @TODO add submenus later --}}
<div class="list-group list-group-flush">
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
