<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'minimum_balance',
        'interest_rate',
        'overdraft_limit',
        'daily_withdraw_limit',
        'daily_transfer_limit',
        'cheque_book',
        'atm_card',
        'online_banking',
        'monthly_fee',
        'status',
    ];
}
