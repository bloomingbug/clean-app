<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = RolesEnum::getRoles();

        foreach ($roles as $role) {
            $roleDB = Role::create(['name' => $role, 'guard_name' => 'web']);

            if ($role === RolesEnum::ADMIN) {
                $roleDB->syncPermissions(Permission::all());
            }
        }
    }
}
