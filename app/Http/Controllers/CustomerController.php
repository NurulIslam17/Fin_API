<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function addCustomer(Request $request)
    {
        authorizePermission("customer.create");
        $this->customerService->addCustomer($request->all());
        return response()->json([
            'status' => true,
            'message' => 'New customer added successfully!'
        ]);
    }
}
