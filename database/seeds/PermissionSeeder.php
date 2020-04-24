<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['action' => 'create'],
            ['action' => 'edit'],
            ['action' => 'store'],
            ['action' => 'update'],
            ['action' => 'destroy'],
        ]);
    }
}
