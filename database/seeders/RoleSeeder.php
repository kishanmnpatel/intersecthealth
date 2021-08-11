<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            'name' => 'Admin',
            'description' => 'This is the administration role',
            'created_at' => now(),
        ]);
        DB::table("roles")->insert([
            'name' => 'Creator',
            'description' => 'This is the creator role',
            'created_at' => now(),
        ]);
        DB::table("roles")->insert([
            'name' => 'Member',
            'description' => 'This is the member role',
            'created_at' => now(),
        ]);
    }
}
