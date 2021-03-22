@extends('layouts.post')

@section('pagetitle', $post->title)

@section('content')
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

    <div class="body-content">
        {!! $post->body !!}

        @auth
            <form action="/post/comment" method="POST">
                @csrf
                <div class="form-group">
                    <div style="border:1px solid #29a19c; padding: 15px;">
                        <label for="comment-body"><h4 style="">Leave a Comment</h4></label>
                        <textarea id="comment-body" class="form-control mb-2" cols="30" rows="10" name="body"></textarea>
                        <button type="submit" id="comment-submit" class="btn btn-primary mt-3">Submit</button>
                    </div>

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                </div>
            </form>
        @endauth

        <comments :post-id="{{ $post->id }}" auth-user="{{ auth()->id() }}"></comments>
    </div>

    @component('components.posts.blocks', [
        'posts' => $post->author->posts->slice(1)->shuffle()->take(3),
        'headerTitle' => 'More Posts By '. $post->author->name
    ])
    @endcomponent
@endsection
