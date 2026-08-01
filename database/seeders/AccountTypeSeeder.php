<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'code' => 'SAV',
                'name' => 'Savings Account',
                'minimum_balance' => 500,
                'interest_rate' => 3.50,
                'overdraft_limit' => 0,
                'daily_withdraw_limit' => 50000,
                'daily_transfer_limit' => 100000,
                'cheque_book' => false,
                'atm_card' => true,
                'online_banking' => true,
                'monthly_fee' => 0,
            ],
            [
                'code' => 'CUR',
                'name' => 'Current Account',
                'minimum_balance' => 0,
                'interest_rate' => 0,
                'overdraft_limit' => 100000,
                'daily_withdraw_limit' => 500000,
                'daily_transfer_limit' => 1000000,
                'cheque_book' => true,
                'atm_card' => true,
                'online_banking' => true,
                'monthly_fee' => 500,
            ],
            [
                'code' => 'STD',
                'name' => 'Student Account',
                'minimum_balance' => 100,
                'interest_rate' => 4.00,
                'overdraft_limit' => 0,
                'daily_withdraw_limit' => 10000,
                'daily_transfer_limit' => 20000,
                'cheque_book' => false,
                'atm_card' => true,
                'online_banking' => true,
                'monthly_fee' => 0,
            ],
            [
                'code' => 'FD',
                'name' => 'Fixed Deposit',
                'minimum_balance' => 100000,
                'interest_rate' => 7.50,
                'overdraft_limit' => 0,
                'daily_withdraw_limit' => 0,
                'daily_transfer_limit' => 0,
                'cheque_book' => false,
                'atm_card' => false,
                'online_banking' => false,
                'monthly_fee' => 0,
            ],
        ];

        foreach ($types as $type) {
            AccountType::firstOrCreate(
                ['code' => $type['code']],
                $type
            );
        }
    }
}
