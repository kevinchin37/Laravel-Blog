<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.category.index',[
            'categories' => Category::orderBy('created_at', 'desc')->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->authorize('create', Category::class);
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {
        $this->authorize('create', Category::class);
        $attributes = $this->validateRequest();

        $category = new Category;
        $attributes['slug'] = Str::slug($attributes['name']);
        $category->create($attributes);

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) {
        return view('admin.category.show', [
            'category' => $category,
            'categoryPosts' => $category->posts()->paginate(15),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category) {
        $this->authorize('update', $category);

        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category) {
        $this->authorize('update', Category::class);
        $attributes = $this->validateRequest();

        $category->update($attributes);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category) {
        $this->authorize('delete', Category::class);
        $category->delete();

        return back();
    }

    public function validateRequest() {
        return request()->validate([
            'name' => 'required|unique:categories',
        ],[
            'name.required' => 'The category name is required.',
            'name.unique' => 'The category name already exists.',
        ]);
    }
}
