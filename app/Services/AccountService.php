<?php

namespace App\Services;

use App\Repositories\AccountRepository;
use App\Repositories\AccountTypeRepository;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountService
{
    private  $accountRepository;
    private  $accountTypeRepository;


    public function  __construct(AccountRepository $accountRepository, AccountTypeRepository $accountTypeRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->accountTypeRepository = $accountTypeRepository;
    }


    public function getAccountTypes()
    {
        return $this->accountTypeRepository->getAccountTypes();
    }
}
        