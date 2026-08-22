<?php

namespace App\Repositories;

use App\Models\Branch;

class BranchRepository
{

    public function getAllBranch($params = [])
    {
        return Branch::when(
            !empty($params['status']),
            function ($query) use ($params) {
                $query->where('status', $params['status']);
            }
        )->get();
    }
}
