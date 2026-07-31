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

        $superAdmin = Role::where('name', 'SUPER_ADMIN')->first();
        $superAdmin->syncPermissions(Permission::all());

        $superAdmin = Role::where('name', 'BANK_ADMIN')->first();
        $superAdmin->givePermissionTo([
            'user.view',
            'user.update'
        ]);

        $cso = Role::where('name', 'CUSTOMER_SERVICE_OFFICER')->first();
        $cso->givePermissionTo([
            'customer.view',
            'customer.create',
            'customer.update',
            'customer.delete',
            'account.view',
            'account.create',
        ]);
    }
}
