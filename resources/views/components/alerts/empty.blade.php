<div class="alert alert-danger" role="alert">
    @if (empty($message))
        Nothing to show.
    @else
        {{ $message }}
    @endif
</div>
