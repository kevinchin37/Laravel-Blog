<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('post.index', [
            'posts' => Post::orderBy('created_at', 'desc')->paginate(16),
        ]);
    }
}
