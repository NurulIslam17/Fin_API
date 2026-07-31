<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@bank.com',
            'password' => Hash::make('superadmin@bank.com'),
        ]);
        // Assign  role
        $admin->assignRole('SUPER_ADMIN');

        $admin = User::create([
            'name' => 'Bank Admin',
            'branch_id' => 1,
            'email' => 'bankadmin@bank.com',
            'password' => Hash::make('bankadmin@bank.com'),
        ]);
        // Assign  role
        $admin->assignRole('BANK_ADMIN');


        $admin = User::create([
            'name' => 'CSO1',
            'branch_id' => 1,
            'email' => 'cso1@bank.com',
            'password' => Hash::make('cso1@bank.com'),
        ]);
        // Assign Admin role
        $admin->assignRole('CUSTOMER_SERVICE_OFFICER');

        $admin = User::create([
            'name' => 'CSO2',
            'branch_id' => 2,
            'email' => 'cso2@bank.com',
            'password' => Hash::make('cso2@bank.com'),
        ]);
        // Assign Admin role
        $admin->assignRole('CUSTOMER_SERVICE_OFFICER');
    }
}
