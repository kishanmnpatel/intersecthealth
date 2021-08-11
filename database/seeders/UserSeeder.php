<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@volt.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'role_id' => '1',
            'status' => 'Active',
            'avatar' => 'profile-picture-1.jpg'
        ]);
        DB::table("users")->insert([
            'first_name' => 'Creator',
            'last_name' => 'User',
            'email' => 'creator@volt.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'role_id' => '2',
            'status' => 'Active',
            'avatar' => 'profile-picture-2.jpg'
        ]);
        DB::table("users")->insert([
            'first_name' => 'Member',
            'last_name' => 'User',
            'email' => 'member@volt.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'role_id' => '3',
            'status' => 'Active',
            'avatar' => 'profile-picture-7.jpg'
        ]);
    }
}
