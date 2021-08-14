<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@volt.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'role_id' => '1',
            'status' => 'Active',
            'avatar' => 'profile-picture-1.jpg'
        ]);
        $user->assignRole('admin');
        $user = User::create([
            'first_name' => 'Creator',
            'last_name' => 'User',
            'email' => 'doctor@volt.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'role_id' => '2',
            'status' => 'Active',
            'avatar' => 'profile-picture-2.jpg'
        ]);
        $user->assignRole('doctor');
        $user = User::create([
            'first_name' => 'Member',
            'last_name' => 'User',
            'email' => 'patient@volt.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'role_id' => '3',
            'status' => 'Active',
            'avatar' => 'profile-picture-7.jpg'
        ]);
        $user->assignRole('patient');
    }
}
