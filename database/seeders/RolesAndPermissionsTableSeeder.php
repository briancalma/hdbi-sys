<?php

namespace Database\Seeders;

use App\Constants\Permissions;
use App\Constants\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rootRole = Role::create(['name' => Roles::ROOT]);
        $inspectorRole = Role::create(['name' => Roles::INSPECTOR]);
        $realStateAgentRole = Role::create(['name' => Roles::REAL_ESTATE_AGENT]);

        $defaultPermissions = [
            ...Permissions::USER,
        ];

        // CREATE PERMISSIONS
        foreach ($defaultPermissions as $permission) {
            $permission = Permission::make(['name' => $permission]);
            $permission->saveOrFail();
        }

        // ASSIGN DEFAULT PERSMISSIONS TO ROOT & INSPECTOR
        $rootRole->syncPermissions($defaultPermissions);
        $inspectorRole->syncPermissions($defaultPermissions);
    }
}
