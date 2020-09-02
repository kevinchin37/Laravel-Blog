@if (!empty($selector) && !empty($slot))
    <script>
        tinymce.init({
            selector: '{{ $selector }}',
            height: 500,
            plugins: 'link',
            toolbar: 'undo redo | styleselect | bold italic | alignleft'
                + 'aligncenter alignright alignjustify | '
                + 'bullist numlist outdent indent | link'
        });
    </script>

    {{ $slot }}
@endif
