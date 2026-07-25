<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.view']);
        Permission::create(['name' => 'user.update']);
        Permission::create(['name' => 'user.delete']);

        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.view']);
        Permission::create(['name' => 'role.update']);
        Permission::create(['name' => 'role.delete']);

        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $user = Role::create(['name' => 'User']);

        $admin->givePermissionTo(Permission::all());

        $manager->givePermissionTo([
            'user.view',
            'user.update'
        ]);

        $user->givePermissionTo([
            'user.view'
        ]);
    }
}
