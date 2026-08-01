<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public function addCustomer($data)
    {
        return Customer::firstOrCreate(
            ['user_id' => $data['user_id']],
            [
                'branch_id'          => $data['branch_id'] ?? null,
                'customer_no'        => 'CUS' . str_pad(($data['user_id'] ?? 0) + 1, 6, '0', STR_PAD_LEFT),
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
