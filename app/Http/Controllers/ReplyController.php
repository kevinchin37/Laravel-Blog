<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $comments = Comment::where('parent_id', request('parent_id'))
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $attributes = request()->validate([
            'body' => 'required',
            'post_id' => 'required',
            'parent_id' => 'nullable'
        ]);

        $attributes['user_id'] = auth()->user()->id;
        $attributes['body'] = Purifier::clean($attributes['body']);
        Comment::create($attributes);

        return response()->json(null, 200);
    }
}
