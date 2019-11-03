<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\ImageService;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.post.index', [
            'posts' => Post::all(),
        ]);
    }

    public function postIndex(Post $post) {
        return view('admin.post.index', [
            'posts' => $post->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category) {
        return view('admin.post.create',[
            'categories' => $category->getCategories(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageService $imageService) {
        $attributes = $this->validateRequest();

        $post = new Post;
        $attributes['slug'] = $post->getSlug($attributes['title']);

        if (!empty($attributes['featured_image'])) {
            $attributes['featured_image'] = $imageService->uploadHandler($attributes['featured_image'])->store();
        }

        $post = $post->create($attributes);

        if (!empty($attributes['category'])) {
            $post->addCategory($attributes['category']);
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
        $attributes = $this->validateRequest();

        if (!empty($attributes['featured_image'])) {
            $attributes['featured_image'] = $imageService->uploadHandler($attributes['featured_image'])->store();
        }

        $post->update($attributes);

        if (!empty($attributes['category'])) {
            $post->updateCategory($attributes['category']);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        $post->delete();
        return back();
    }

    public function getSlug($title) {
        $slug = str_slug($title);
        if (Post::where('slug', '=', $slug)->get()->isNotEmpty()) {
            $slugCount = (Post::where('slug', 'like', $slug . '-%')->get()->count()) + 1;
            $slug = $slug . '-' . $slugCount;
        }

        return $slug;
    }

    public function validateRequest() {
        return request()->validate([
            'title' => 'required',
            'body' => 'nullable',
            'featured_image' => 'sometimes|file|image|max:5000',
            'category' => 'nullable'
        ]);
    }
}
