<h1 class="header-title">{{ (empty($headerTitle)) ? 'Older Posts' : $headerTitle }}</h1>

@if ($posts->isNotEmpty())
    <div id="post-blocks" class="row">
        @foreach ($posts as $post)
            <div class="col-sm-6 col-lg-4 mb-2">
                <a class="block" href="/post/{{ $post->slug }}">
                    @if (!empty($post->featured_image))
                        <div class="thumbnail-wrapper">
                            <img class="thumbnail" src="{{ asset('storage/' . $post->featured_image) }}"/>
                        </div>
                    @endif

                    <div class="meta-wrapper">
                        <h4 class="title">{{ $post->title }}</h4>
                        <p class="description">{{ Str::words($post->body, 15) }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-danger" role="alert">
        There are no more posts to show.
    </div>
@endif
