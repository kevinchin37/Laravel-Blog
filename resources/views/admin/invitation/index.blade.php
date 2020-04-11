@extends('admin.layouts.table')

@section('header_title', 'Invitations')

@section('header_links')
    <a class="btn btn-primary" href="/admin/invitations/create">Create Invite Link</a>
@endsection

@section('table_header_columns')
    @if ($invitations->isEmpty())
        @component('components.alerts.empty')
            @slot('message')
                No current invitations.
            @endslot
        @endcomponent
    @else
        <th scope="col">Email</th>
        <th scope="col">Link</th>
        <th scope="col">Status</th>
        <th scope="col">Actions</th>
    @endif
@endsection

@section('table_body')
    @foreach ($invitations as $invitation)
    <tr>
        <td>{{ $invitation->email }}</td>
        <td>
            @if (!empty($invitation->getInviteLink()))
                <a href="{{ $invitation->getInviteLink() }}">Invite Link</a>
            @else
                <span>Registered</span>
            @endif
        </td>

        <td class="{{ $invitation->status === 'Accepted' ? 'text-success' : 'text-danger' }}">{{ $invitation->status }}</td>

        <td>
            <form action="/admin/invitations/{{ $invitation->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
@endsection

@section('pagination_links')
    {{ $invitations->links() }}
@endsection
