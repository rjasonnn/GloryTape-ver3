<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Make role
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        //Make permission
        $permissionCreate = Permission::create(['name' => 'create']);
        $permissionRead = Permission::create(['name' => 'read']);
        $permissionUpdate = Permission::create(['name' => 'update']);
        $permissionDelete = Permission::create(['name' => 'delete']);

        //Assign permission to role
        $roleAdmin->givePermissionTo($permissionCreate);
        $roleAdmin->givePermissionTo($permissionRead);
        $roleAdmin->givePermissionTo($permissionUpdate);
        $roleAdmin->givePermissionTo($permissionDelete);

        $roleUser->givePermissionTo($permissionRead);
    }
}
