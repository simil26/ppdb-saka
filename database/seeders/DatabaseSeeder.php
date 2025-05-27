<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Biodata;
use App\Models\UserAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Biodata::factory(100)->create();
        // User::create([
        //     'name' => 'Peserta Didik 1',
        //     'email' => 'siswa@siswa.com',
        //     'password' => Hash::make('password'),
        // ]);
        UserAdmin::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin1234'),
        ]);

        // User::create([
        //     'noreg_ppdb' => 'PPDB-202505163812',
        //     'name' => 'Muhamad Ramdani',
        //     'email' => 'mrh@siswa.com',
        //     'password' => Hash::make('ramdani@3001'),
        //     'bukti_bayar' => 'PPDB-202505163812-bukti_bayar.jpg'
        // ]);
    }
}
