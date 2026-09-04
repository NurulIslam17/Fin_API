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


    public function allCustomer(Request $request)
    {
        authorizePermission("customer.view");
        $customers = $this->customerService->allCustomer($request->all());
        return response()->json([
            "data" => $customers,
            'status' => true,
            'message' => 'All customer fetched successfully!'
        ]);
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
