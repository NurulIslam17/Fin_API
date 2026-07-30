<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{

    private  $userRepository;

    public function  __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAl($params)
    {
        return $this->userRepository->getAl($params);
    }

    public function deleteBYId($id)
    {
        return $this->userRepository->deleteBYId($id);
    }
}
