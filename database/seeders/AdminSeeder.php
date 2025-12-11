<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin BPC',
            'username' => 'adminbpc',
            'email' => 'adminbpc@hipmi.com',
            'password' => Hash::make('password123'),
            'category' => 'bpc',
        ]);

        Admin::create([
            'name' => 'Admin BPD',
            'username' => 'adminbpd',
            'email' => 'adminbpd@hipmi.com',
            'password' => Hash::make('password123'),
            'category' => 'bpd',
        ]);
    }
}