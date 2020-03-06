<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $filters = [
            'title' => [
                'column' => 'title',
                'operator' => 'like',
                'value' => (request()->has('title')) ? '%' . request()->title . '%' : ''
            ],
            'author' => [
                'column' => 'user_id',
                'operator' => '=',
                'value' => (request()->has('author')) ? request()->author : ''
            ],
        ];

        $filterConditions = [];
        foreach ($filters as $filter) {
            if (empty($filter['value'])) continue;
            $filterConditions[] = [$filter['column'], $filter['operator'], $filter['value']];
        }

        $posts = Post::where($filterConditions);
        if (request()->has('category')) {
            $posts = Post::whereHas('categories', function ($query) use($filterConditions) {
                return $query->where('category_post.category_id', request()->category)->where($filterConditions);
            });
        }

        return view('admin.search.index', [
            'posts' => $posts->orderBy('created_at', 'desc')->paginate(15)
        ]);
    }
}
