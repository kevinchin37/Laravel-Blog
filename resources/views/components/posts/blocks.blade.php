@if ($posts->isNotEmpty())
    <h1 class="header-title w-100">{{ (empty($headerTitle)) ? 'Older Posts' : $headerTitle }}</h1>
    <div id="post-blocks">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-2">
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
            </div>
        </div>
    </div>
@endif
