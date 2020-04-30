<?php

use Illuminate\Support\Str;
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
        $roles = [];
        foreach (['Owner', 'Admin', 'Editor', 'Guest'] as $role) {
            $roles[] = [
                'name' => $role,
                'slug' => Str::slug($role)
            ];
        }

        DB::table('roles')->insert($roles);
    }
}
