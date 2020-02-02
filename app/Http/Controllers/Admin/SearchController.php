<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\User;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $author = User::where('name', '=', request()->author)->get();
        $filters = [
            'title' => [
                'column' => 'title',
                'operator' => 'like',
                'value' => (request()->has('title')) ? '%' . request()->title . '%' : ''
            ],
            'author' => [
                'column' => 'user_id',
                'operator' => '=',
                'value' => (!empty($author->first()->id)) ? $author->first()->id : ''
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
            'posts' => $posts->paginate(15)
        ]);
    }
}
