<?php

namespace App\Http\Controllers\Admin;

use App\Widgets\WidgetBuilder;
use App\Widgets\Latest\LatestTags;
use App\Widgets\Latest\LatestPosts;
use App\Http\Controllers\Controller;
use App\Widgets\Latest\LatestActivities;
use App\Widgets\Latest\LatestCategories;

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
                (new WidgetBuilder(new LatestActivities, 'Activities'))->getSettings(),
                (new WidgetBuilder(new LatestPosts, 'Latest Posts'))->getSettings(),
                (new WidgetBuilder(new LatestCategories, 'Latest Categories'))->getSettings(),
                (new WidgetBuilder(new LatestTags, 'Latest Tags'))->getSettings(),
            ]
        ]);
    }
}
