<?php

namespace App\Services;

use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CustomerService
{
    private  $customerRepository;
    private $userService;

    public function  __construct(CustomerRepository $customerRepository, UserService $userService)
    {
        $this->customerRepository = $customerRepository;
        $this->userService = $userService;
    }

    public function addCustomer($data)
    {
        return DB::transaction(function () use ($data) {
            $cso                = $this->userService->findById(auth()->id());
            $data['branch_id']  = $cso['branch_id'];
            $data['name']       = $data['first_name'] . ' ' . $data['last_name'];

            $user               = $this->userService->addUser($data);
            $data['user_id']    = $user['id'];

            return $this->customerRepository->addCustomer($data);
        });
    }
}
