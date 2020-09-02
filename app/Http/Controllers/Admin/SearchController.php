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
                'value' => (request('title')) ? '%' . request('title') . '%' : ''
            ],
            'author' => [
                'column' => 'user_id',
                'operator' => '=',
                'value' => (request('author')) ? request('author') : ''
            ],
        ];

        $filterConditions = [];
        foreach ($filters as $filter) {
            if (empty($filter['value'])) continue;
            $filterConditions[] = [$filter['column'], $filter['operator'], $filter['value']];
        }

        $posts = Post::where($filterConditions);
        if (request('category')) {
            $posts = $posts->whereHas('categories', function ($query) {
                return $query->where('category_post.category_id', request('category'));
            });
        }

        if (request('tag')) {
            $posts = $posts->whereHas('tags', function ($query) {
                return $query->where('post_tag.tag_id', request('tag'));
            });
        }

        return view('admin.search.index', [
            'posts' => $posts->orderBy('created_at', 'desc')->paginate(15),
        ]);
    }
}
