<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;

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
    public function create() {
        $this->authorize('create', Post::class);
        return view('admin.post.create',[
            'tags'=> Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {
        $this->authorize('create', Post::class);
        $attributes = $this->validateRequest();

        $post = new Post;
        $attributes['slug'] = $post->getSlug($attributes['title']);
        $attributes['user_id'] = auth()->user()->id;

        if (!empty($attributes['body'])) {
            $attributes['body'] = Purifier::clean($attributes['body']);
        }

        if (!empty($attributes['featured_image'])) {
            $attributes['featured_image'] = resizeAndStoreImage($attributes['featured_image'], [
                'prefix' => 'attachment',
                'path' => '/uploads/attachments'
            ]);
        }

        $post = $post->create($attributes);
        $post->addCategories($attributes);
        $post->addTags($attributes);

        return redirect('/admin/posts/' . $post->slug . '/edit')
            ->with('status', 'Post has been created.');
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
    public function update(Post $post) {
        $this->authorize('update', $post);
        $attributes = $this->validateRequest();

        if (!empty($attributes['body'])) {
            $attributes['body'] = Purifier::clean($attributes['body']);
        }

        if (!empty($attributes['featured_image'])) {
            Storage::disk('public')->delete($post->featured_image);
            $attributes['featured_image'] = resizeAndStoreImage($attributes['featured_image'], [
                'prefix' => 'attachment',
                'path' => '/uploads/attachments'
            ]);
        }

        $post->updateCategories($attributes);
        $post->updateTags($attributes);
        $post->update($attributes);

        return back()->with('status', 'Post updated.');
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

        return back()->with('status', 'Post has been deleted.');
    }

    public function validateRequest() {
        return request()->validate([
            'title' => 'required',
            'body' => 'nullable',
            'featured_image' => 'sometimes|file|image|max:5000',
            'categories' => 'nullable',
            'tags' => 'nullable'
        ]);
    }
}
