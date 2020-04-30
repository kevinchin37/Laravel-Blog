<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Owner',
                'slug' => 'owner',
                'permissions' => [
                    ['role_id' => 1, 'permission_id' => 1],
                    ['role_id' => 1, 'permission_id' => 2],
                    ['role_id' => 1, 'permission_id' => 3]
                ],
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'permissions' => [
                    ['role_id' => 2, 'permission_id' => 1],
                    ['role_id' => 2, 'permission_id' => 2],
                    ['role_id' => 2, 'permission_id' => 3]
                ],
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
                'permissions' => [
                    ['role_id' => 3, 'permission_id' => 1],
                    ['role_id' => 3, 'permission_id' => 2],
                ],
            ],
            [
                'name' => 'Guest',
                'slug' => 'guest',
                'permissions' => [],
            ],
        ];

        foreach ($roles as $role) {
            $createdRole = Role::create([
                'name' => $role['name'],
                'slug' => $role['slug']
            ]);
            $createdRole->permissions()->attach($role['permissions']);
        }
    }
}
