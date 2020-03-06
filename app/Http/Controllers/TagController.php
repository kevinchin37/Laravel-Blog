<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag) {
        return view('tag.show', [
            'posts' => $tag->posts()
                ->orderBy('created_at', 'desc')
                ->paginate(16),
            'tagName' => $tag->name
        ]);
    }
}
