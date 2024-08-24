<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'username' => 'superadmin',
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('password'),
            'gender' => 'M',
        ]);

        $admin = User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'gender' => 'M',
        ]);

        $user = User::create([
            'username' => 'user',
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => bcrypt('password'),
            'gender' => 'M',
        ]);

        $roleSuperAdmin = Role::where('name', 'Super Admin')->first();
        $roleAdmin = Role::where('name', 'Admin')->first();
        $roleUser = Role::where('name', 'User')->first();

        $superadmin->assignRole($roleSuperAdmin);
        $admin->assignRole($roleAdmin);
        $user->assignRole($roleUser);
    }
}
