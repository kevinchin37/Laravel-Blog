<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.tag.index', [
            'tags' => Tag::paginate(15),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {
        $this->authorize('create', Tag::class);
        $attributes = $this->validateRequest();

        $tag = new Tag;
        $attributes['slug'] = str_slug($attributes['name']);
        $tag->create($attributes);

        return redirect('/admin/tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag) {
        return view('admin.tag.show', [
            'tag' => $tag,
            'posts' => $tag->posts()->paginate(15),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag) {
        $this->authorize('update', Tag::class);

        return view('admin.tag.edit', [
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Tag $tag) {
        $this->authorize('update', Tag::class);
        $attributes = $this->validateRequest();

        $tag->update($attributes);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag) {
        $this->authorize('delete', Tag::class);
        $tag->delete();

        return back();
    }

    public function validateRequest() {
        return request()->validate([
            'name' => 'required|unique:tags',
        ],[
            'name.required' => 'The tag name is required.',
            'name.unique' => 'The tag name already exists.',
        ]);
    }
}
