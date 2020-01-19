@if (!empty($post))
    <h1 class="header-title">{{ (empty($headerTitle)) ? 'Latest' : $headerTitle }}</h1>
    <div id="latest-post" class="jumbotron">
        <div class="row">
            <div class="col-md-3">
                <div class="thumbnail-wrapper{{ (empty($post->featured_image))? ' placeholder' : '' }}">
                    @if (!empty($post->featured_image))
                        <img class="thumbnail" src="{{ asset('storage/' . $post->featured_image) }}"/>
                    @endif
                </div>

                <div class="meta-wrapper">
                    <ul class="meta-list">
                        <li class="post-meta">
                            <span>By:</span> {{ $post->author->name }}
                        </li>

                        <li class="post-meta">
                            <span>Published:</span> {{ $post->created_at }}
                        </li>

                        <li class="post-meta">
                            <span>Categories:</span>
                            @foreach ($post->categories as $category)
                                <a class="taxonomy-link" href="/category/{{ $category->slug }}">{{ $category->name }}</a>
                            @endforeach
                        </li>

                        <li class="post-meta">
                            <span>Tags:</span>
                            @foreach ($post->tags as $tag)
                                <a class="taxonomy-link" href="/tag/{{ $tag->slug }}">{{ $tag->name }}</a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <h1>{{ $post->title }}</h1>
                <div>{{ Str::words($post->body, 150) }}</div>
                <a class="btn btn-read-more" href="{{ '/post/' . $post->slug }}">Continue Reading</a>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-danger" role="alert">
        There are no posts to show.
    </div>
@endif
