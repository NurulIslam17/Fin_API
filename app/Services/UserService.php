<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Log;

class UserService
{

    private  $userRepository;

    public function  __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function addUser($data)
    {
        return $this->userRepository->addUser($data);
    }

    public function getAl($params)
    {
        return $this->userRepository->getAl($params);
    }

    public function addOfficeUser($data)
    {
        return $this->userRepository->addUser($data);
    
    }

    public function getAllOfficeUsers($params)
    {
        return $this->userRepository->getAllOfficeUsers($params);
    }

    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function deleteBYId($id)
    {
        return $this->userRepository->deleteBYId($id);
    }
}
