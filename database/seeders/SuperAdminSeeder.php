<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@hipmi-jabar.org',
            'password' => Hash::make('password123'),
            'category' => 'super_admin',
            'domisili' => null,
        ]);
    }
}