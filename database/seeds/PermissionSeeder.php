<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permissions = [
        //     [
        //         'name' => 'Create',
        //         'slug' => 'create',
        //         'method' => 'store'
        //     ],
        //     [
        //         'name' => 'Update',
        //         'slug' => 'update',
        //         'method' => 'update'
        //     ],
        //     [
        //         'name' => 'Delete',
        //         'slug' => 'delete-post',
        //         'method' => 'destroy'
        //     ],
        // ];

        // DB::table('permissions')->insert($permissions);

        // var_dump(Route::current()->getActionName());
        // var_dump(Route::current()->getActionMethod());
        $actions = ['create', 'edit', 'store', 'update', 'destroy'];

        foreach(Route::getRoutes()->getRoutes() as $route) {
            // var_dump($route->getActionName());
            // var_dump($route->getActionName());
            // var_dump($route->getControllerMethod());

            $routeAction = explode('@', $route->getActionName());
            if (empty($routeAction[1]) || !in_array($routeAction[1], $actions)) continue;

            $controller = explode('\\', $routeAction[0]);
            $controller = end($controller);

            $method = $routeAction[1];
            var_dump($controller . '@' . $method);
        }


        // $permission_ids = [];
        // foreach (App\Permission::all() as $permission) {
        //     $permission_ids[] = $permission->id;
        // }

        // $admin = Role::where('name', 'admin')->first();
        // $admin->permissions()->attach($permission_ids);
    }
}
