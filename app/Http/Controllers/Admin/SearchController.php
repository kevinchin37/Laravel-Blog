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
        $author = User::where('name', '=', request()->author);
        $filters = [
            'title' => [
                'column' => 'title',
                'operator' => 'like',
                'value' => '%' . request()->title . '%'
            ],
            'author' => [
                'column' => 'user_id',
                'operator' => '=',
                'value' => (!empty($author->id)) ? $author->id : ''
            ]
        ];

        $filterConditions = [];
        foreach ($filters as $filter) {
            if (empty($filter['value'])) continue;
            $filterConditions[] = [$filter['column'], $filter['operator'], $filter['value']];
        }

        $posts = Post::where($filterConditions)->paginate(15);
        return view('admin.search.index', [
            'posts' => $posts
        ]);
    }
}
