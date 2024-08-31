<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = PermissionsEnum::getPermissions();

        foreach (array_chunk($permissions, 10) as $chunk) {
            foreach ($chunk as $value) {
                Permission::create(['name' => $value, 'guard_name' => 'web']);
            }
        }
    }
}
