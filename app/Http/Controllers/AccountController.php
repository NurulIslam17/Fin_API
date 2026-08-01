<?php

namespace App\Http\Controllers;

use App\Services\AccountService;

class AccountController extends Controller
{

    private $acountService;

    public function  __construct(AccountService $acountService,)
    {
        $this->acountService = $acountService;
    }

    public function getAccountTypes()
    {

        authorizePermission("account_type.view");
        $accountTypes =  $this->acountService->getAccountTypes();

        return response()->json([
            'status'    => true,
            'message'   => "Account types fetched successsfully!",
            'data'      => $accountTypes
        ]);
    }
}
