<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            // Dashboard
            'dashboard.view',

            // User Management
            'user.view',
            'user.create',
            'user.update',
            'user.delete',

            // Role Management
            'role.view',
            'role.create',
            'role.update',
            'role.delete',

            // Permission Management
            'permission.view',
            'permission.create',
            'permission.update',
            'permission.delete',
            'permission.assign',

            // Branch Management
            'branch.view',
            'branch.create',
            'branch.update',
            'branch.delete',

            // Customer Management
            'customer.view',
            'customer.create',
            'customer.update',
            'customer.delete',

            // Account Management
            'account.view',
            'account.create',
            'account.update',
            'account.close',

            // Transactions
            'transaction.view',
            'transaction.create',
            'transaction.update',
            'transaction.delete',
            'transaction.reject',

            // Loan Management
            'loan.view',
            'loan.create',
            'loan.approve',
            'loan.reject',
            'loan.update',

            // Card Management
            'card.view',
            'card.create',
            'card.block',
            'card.replace',

            // Reports
            'report.view',
            'report.export',

            // Audit
            'audit.view',

            // Settings
            'setting.view',
            'setting.update',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
