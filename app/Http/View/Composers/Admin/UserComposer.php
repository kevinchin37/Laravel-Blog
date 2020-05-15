<?php

namespace App\Http\View\Composers\Admin;

use Illuminate\View\View;

class UserComposer {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {
        $view->with('user', auth()->user());
    }
}
