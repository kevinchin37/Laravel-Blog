<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $comments = Comment::where('post_id', request('post_id'))
            ->where('parent_id', null)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {
        $attributes = request()->validate([
            'body' => 'required',
            'user_id' => 'required',
            'post_id' => 'required',
            'parent_id' => 'nullable'
        ]);

        $attributes['body'] = Purifier::clean($attributes['body']);
        Comment::create($attributes);

        return back();
    }
}
