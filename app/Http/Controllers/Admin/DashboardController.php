<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Activity;
use App\Category;
use App\Widgets\Widget;
use App\Widgets\ActivityLog;
use App\Widgets\LatestEntries;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.dashboard.index', [
            'widgets' => [
                (new Widget(new LatestEntries(new Post, 5), 'Latest Posts'))->getSettings(),
                (new Widget(new LatestEntries(new Category, 5), 'Latest Categories'))->getSettings(),
                (new Widget(new LatestEntries(new Tag, 5), 'Latest Tags', 4))->getSettings(),
                (new Widget(new ActivityLog(new Activity, 3), 'Activities', 8))->getSettings(),
            ]
        ]);
    }
}
