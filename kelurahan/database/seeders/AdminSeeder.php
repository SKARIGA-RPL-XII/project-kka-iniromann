<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'admin',
            'nama' => 'Administrator',
            'email' => 'admin@kelurahan.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
        
        Admin::create([
            'username' => 'petugas',
            'nama' => 'Petugas Kelurahan',
            'email' => 'petugas@kelurahan.com',
            'password' => Hash::make('petugas123'),
            'role' => 'petugas'
        ]);
    }
}
