@if (!empty(session('status')))
    <div class="alert alert-info" role="alert">
        {{ session('status') }}
    </div>
@endif
