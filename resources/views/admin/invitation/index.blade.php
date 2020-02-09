@extends('admin.layouts.table')

@section('header_title', 'Invitations')

@section('header_links')
    <a class="btn btn-primary" href="/admin/invitations/create">Create Invite Link</a>
@endsection

@section('table_header_columns')
    @if ($invitations->isEmpty())
        @component('admin.components.alerts.empty')
            @slot('message')
                No current invitations.
            @endslot
        @endcomponent
    @else
        <th scope="col">ID</th>
        <th scope="col">Email</th>
        <th scope="col">Link</th>
        <th scope="col">Status</th>
    @endif
@endsection

@section('table_body')
    @foreach ($invitations as $invitation)
    <tr>
        <th scope="row">{{ $invitation->id }}</th>
        <td>{{ $invitation->email }}</td>
        <td><a href="{{ url('invitation/' . $invitation->token) }}">Invite Link</a></td>
        <td>{{ $invitation->status }}</td>
    </tr>
    @endforeach
@endsection

@section('pagination_links')
    {{ $invitations->links() }}
@endsection
