<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissions = [];
        $actions = ['create', 'edit', 'store', 'update', 'destroy'];

        foreach(Route::getRoutes()->getRoutes() as $route) {
            $routeAction = explode('@', $route->getActionName());
            if (empty($routeAction[1]) || !in_array($routeAction[1], $actions)) continue;

            $controller = explode('\\', $routeAction[0]);
            $controller = end($controller);

            $action = $routeAction[1];
            $permissions[] = [
                'name' => ucfirst($action),
                'controller' => $controller,
                'action' => $action
            ];
        }

        DB::table('permissions')->insert($permissions);

        foreach (App\Permission::all() as $permission) {
            $permission_ids[] = $permission->id;
        }

        $admin = App\Role::where('name', 'admin')->first();
        $admin->permissions()->attach($permission_ids);
    }
}
