<div id="post-detail" class="row meta-wrapper">
    <h1 class="col-md-12">{{ $post->title }}</h1>

    <ul class="col-md-6 meta-list">
        <li class="post-meta">
            <span>By:</span> {{ $post->author->name }}
        </li>
        <li class="post-meta">
            <span>Published:</span> {{ $post->created_at }}
        </li>
    </ul>

    @if ($post->categories->isNotEmpty() || $post->tags->isNotEmpty())
        <ul class="col-md-6 meta-list">
            @if ($post->categories->isNotEmpty())
                <li class="post-meta">
                    <span>Categories:</span>
                    @foreach ($post->categories as $category)
                        <a class="taxonomy-link" href="/category/{{ $category->slug }}">{{ $category->name }}</a>
                    @endforeach
                </li>
            @endif

            @if ($post->tags->isNotEmpty())
                <li class="post-meta">
                    <span>Tags:</span>
                    @foreach ($post->tags as $tag)
                        <a class="taxonomy-link" href="/tag/{{ $tag->slug }}">{{ $tag->name }}</a>
                    @endforeach
                </li>
            @endif
        </ul>
    @endif
</div>

<div class="body-content">{{ $post->body }}</div>
