<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Activity;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity) {
        return view('admin.dashboard.index', [
            'posts' => Post::latest()->get()->take(5),
            'activities' => $activity->latest()->get()->take(5),
        ]);
    }
}
