<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Sesuaikan kata sandi
            'role' => 'admin', // Peran admin
        ]);

        // Seeder tambahan untuk user biasa
        User::factory(10)->create(); // Membuat 10 user biasa secara otomatis
    }
}

