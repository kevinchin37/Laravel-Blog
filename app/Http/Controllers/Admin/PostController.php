<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function create(Category $category)
    {
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
    public function store()
    {
        $attributes = $this->validateRequest();
        $post = new Post;
        $post->title = $attributes['title'];
        $post->slug = $this->getSlug($attributes['title']);

        if (!empty($attributes['featured_image'])) {
            $post->featured_image = $this->storeImage($attributes['featured_image']);
        }

        $post->save();

        if (request()->has('category')) {
            $post->categories()->attach(request('category'));
        }

        return redirect('/admin/posts/' . $post->slug . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
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
    public function update(Post $post)
    {
        $attributes = $this->validateRequest();
        $post->title = $attributes['title'];
        $post->body = $attributes['body'];

        if (!empty($attributes['featured_image'])) {
            $this->deleteImage($post->featured_image);
            $post->featured_image = $this->storeImage($attributes['featured_image']);
        }

        $post->save();

        if (request()->has('category')) {
            $post->categories()->sync(request('category'));
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }

    public function getSlug($title)
    {
        $slug = str_slug($title);
        if (Post::where('slug', '=', $slug)->get()->isNotEmpty()) {
            $slugCount = (Post::where('slug', 'like', $slug . '-%')->get()->count()) + 1;
            $slug = $slug . '-' . $slugCount;
        }

        return $slug;
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'nullable',
            'featured_image' => 'sometimes|file|image|max:5000',
        ]);
    }

    public function storeImage($image)
    {
        $file_name = time() . '-' . $image->getClientOriginalName();
        return $image->storeAs('uploads', $file_name, 'public');
    }

    public function deleteImage($image)
    {
        if (Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }
    }
}
