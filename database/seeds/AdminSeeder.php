<?php

use App\Role;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role_id' => Role::OWNER_ROLE_ID, // owner,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
