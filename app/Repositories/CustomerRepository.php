<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{

    public function allCustomer($params)
    {
        return Customer::with('user', 'branch')->get();
    }

    public function addCustomer($data)
    {
        return Customer::Create(
            [
                'branch_id'          => $data['branch_id'] ?? null,
                'customer_no'        => generateCustomerId(),
                'first_name'         => $data['first_name'] ?? null,
                'last_name'          => $data['last_name'] ?? null,
                'gender'             => $data['gender'] ?? null,
                'date_of_birth'      => $data['date_of_birth'] ?? null,
                'phone'              => $data['phone'] ?? null,
                'email'              => $data['email'] ?? null,
                'nid'                => $data['nid'] ?? null,
                'occupation'         => $data['occupation'] ?? null,
                'present_address'    => $data['present_address'] ?? null,
                'permanent_address'  => $data['permanent_address'] ?? null,
                'created_by'         => auth()->id()
            ]
        );
    }
}
