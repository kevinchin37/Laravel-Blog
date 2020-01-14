<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use App\Services\ImageService;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.post.index', [
            'posts' => Post::orderBy('created_at', 'desc')->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, Tag $tags) {
        $this->authorize('create', Post::class);
        return view('admin.post.create',[
            'categories' => $category->getCategories(),
            'tags'=> $tags->getTags(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageService $imageService) {
        $this->authorize('create', Post::class);
        $attributes = $this->validateRequest();

        $post = new Post;
        $attributes['slug'] = $post->getSlug($attributes['title']);
        $attributes['user_id'] = auth()->user()->id;

        if (!empty($attributes['featured_image'])) {
            $attributes['featured_image'] = $imageService->uploadHandler($attributes['featured_image'])->store();
        }

        $post = $post->create($attributes);

        if (!empty($attributes['category'])) {
            $post->addCategories($attributes['category']);
        }

        if (!empty($attributes['tags'])) {
            $post->addTags($attributes['tags']);
        }

        return redirect('/admin/posts/' . $post->slug . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        return view('admin.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        return view('admin.post.edit', [
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, ImageService $imageService) {
        $this->authorize('update', $post);
        $attributes = $this->validateRequest();

        if (!empty($attributes['featured_image'])) {
            $attributes['featured_image'] = $imageService->uploadHandler($attributes['featured_image'])->update($post->featured_image);
        }

        if (!empty($attributes['category'])) {
            $post->updateCategories($attributes['category']);
        }

        if (!empty($attributes['tags'])) {
            $post->updateTags($attributes['tags']);
        }

        $post->update($attributes);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }

    public function validateRequest() {
        return request()->validate([
            'title' => 'required',
            'body' => 'nullable',
            'featured_image' => 'sometimes|file|image|max:5000',
            'category' => 'nullable',
            'tags' => 'nullable'
        ]);
    }
}
