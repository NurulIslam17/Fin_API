<?php

namespace App\Services;

use App\Repositories\OfficeUserRepository;

class OfficeUserService
{

    private $officeUserRepository;

    public function __construct(OfficeUserRepository $officeUserRepository)
    {
        $this->officeUserRepository = $officeUserRepository;
    }

    public function saveOfficeUser($data)
    {
        $this->officeUserRepository->saveOfficeUser($data);
    }
}
