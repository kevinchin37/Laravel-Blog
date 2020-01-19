@if ($posts->isNotEmpty())
    <h1 class="header-title">{{ (empty($headerTitle)) ? 'Older Posts' : $headerTitle }}</h1>
    <div id="post-blocks" class="row">
        @foreach ($posts as $post)
            <div class="col-sm-6 col-lg-4 mb-2">
                <a class="block" href="/post/{{ $post->slug }}">
                    <div class="thumbnail-wrapper{{ (empty($post->featured_image))? ' placeholder' : '' }}">
                        @if (!empty($post->featured_image))
                            <img class="thumbnail" src="{{ asset('storage/' . $post->featured_image) }}"/>
                        @endif
                    </div>

                    <div class="meta-wrapper">
                        <h4 class="title">{{ $post->title }}</h4>
                        <p class="description">{{ Str::words($post->body, 15) }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endif
