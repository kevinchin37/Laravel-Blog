<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) {
        return view('category.show', [
            'posts' => $category->posts()->orderBy('created_at', 'desc')->paginate(16),
            'categoryName' => $category->name
        ]);
    }
}
