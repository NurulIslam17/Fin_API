<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'Head Office',
                'code' => 'HO001',
                'phone' => '01700000001',
                'email' => 'headoffice@bank.com',
                'manager_name' => 'System Administrator',
                'address' => 'Motijheel',
                'city' => 'Dhaka',
                'country' => 'Bangladesh',
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Dhaka Branch',
                'code' => 'DB001',
                'phone' => '01700000002',
                'email' => 'dhaka@bank.com',
                'manager_name' => 'John Doe',
                'address' => 'Gulshan',
                'city' => 'Dhaka',
                'country' => 'Bangladesh',
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Chattogram Branch',
                'code' => 'CTG001',
                'phone' => '01700000003',
                'email' => 'ctg@bank.com',
                'manager_name' => 'Jane Smith',
                'address' => 'Agrabad',
                'city' => 'Chattogram',
                'country' => 'Bangladesh',
                'status' => 'ACTIVE',
            ],
        ];

        foreach ($branches as $branch) {
            Branch::firstOrCreate(
                ['code' => $branch['code']],
                $branch
            );
        }
    }
}
