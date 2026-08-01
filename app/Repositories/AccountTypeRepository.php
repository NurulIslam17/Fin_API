<?php

namespace App\Repositories;

use App\Models\AccountType;
use App\Models\Customer;

class AccountTypeRepository
{

    public function getAccountTypes()
    {
        return AccountType::latest()->get();
    }
}
