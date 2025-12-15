<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('password123');

        // Array 27 Kabupaten/Kota di Jawa Barat
        $kabupatens = [
            // 9 Kota
            'Bandung',
            'Bekasi',
            'Bogor',
            'Cimahi',
            'Cirebon',
            'Depok',
            'Sukabumi',
            'Tasikmalaya',
            'Banjar',
            
            // 18 Kabupaten
            'Bandung Barat',
            'Kabupaten Bandung',
            'Kabupaten Bekasi',
            'Kabupaten Bogor',
            'Ciamis',
            'Cianjur',
            'Kabupaten Cirebon',
            'Garut',
            'Indramayu',
            'Karawang',
            'Kuningan',
            'Majalengka',
            'Pangandaran',
            'Purwakarta',
            'Subang',
            'Kabupaten Sukabumi',
            'Sumedang',
            'Kabupaten Tasikmalaya',
        ];

        // Create BPC untuk setiap Kabupaten/Kota
        foreach ($kabupatens as $kabupaten) {
            $username = 'bpc_' . strtolower(str_replace(' ', '_', $kabupaten));
            $email = 'bpc.' . strtolower(str_replace(' ', '', $kabupaten)) . '@hipmi.com';
            
            Admin::create([
                'name' => 'Admin BPC ' . $kabupaten,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'category' => 'bpc',
                'domisili' => $kabupaten,
            ]);
        }

        // BPD (tidak perlu domisili)
        Admin::create([
            'name' => 'Admin BPD Jawa Barat',
            'username' => 'adminbpd',
            'email' => 'adminbpd@hipmi.com',
            'password' => $password,
            'category' => 'bpd',
            'domisili' => null,
        ]);
    }
}