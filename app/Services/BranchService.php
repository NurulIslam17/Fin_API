<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\BranchRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class BranchService
{

    private  $branchRepository;

    public function  __construct(BranchRepository $branchRepository)
    {
        $this->branchRepository = $branchRepository;
    }

    public function getAllBranch($params)
    {
        return $this->branchRepository->getAllBranch($params);
    }
}
