<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'jabatan' => 'Admin',
            'password' => Hash::make('admin12345'),
            'is_tugas' => false,
        ]);

        User::create([
            'nama' => 'Karyawan',
            'email' => 'Karyawan@gmail.com',
            'jabatan' => 'Karyawan',
            'password' => Hash::make('karyawan12345'),
            'is_tugas' => false,
        ]);


    }
}
