<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $superadmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $admin = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $user = Role::create(['name' => 'User', 'guard_name' => 'web']);

        $permissions = Permission::all();
        $admin->syncPermissions($permissions);
    }
}
