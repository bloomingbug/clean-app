<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = [
            'permission.index',
            'role.index',
            'role.add',
            'role.edit',
            'role.delete',
            'user.index',
            'user.create',
            'user.verif',
            'user.change-password',
            'user.detail',
            'user.edit',
            'user.delete',
            'campaign.index',
            'campaign.detail',
            'campaign.add',
            'campaign.edit',
            'campaign.approve',
            'campaign.fund',
            'campaign.act',
            'campaign.delete',

            'report.index',

            'cleanup.index',
            'cleanup.detail',
            'cleanup.add',
            'cleanup.vote',

            'cleanfund.index',
            'cleanfund.detail',
            'cleanfund.donate',

            'cleanact.index',
            'cleanact.detail',
            'cleanact.register',
        ];

        foreach (array_chunk($permission, 10) as $chunk) {
            foreach ($chunk as $value) {
                Permission::create(['name' => $value, 'guard_name' => 'web']);
            }
        }
    }
}
