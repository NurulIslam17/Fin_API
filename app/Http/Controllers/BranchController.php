<?php

namespace App\Http\Controllers;

use App\Services\BranchService;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    private $branchService;

    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }

    public function getAllBranch(Request $request)
    {
        authorizePermission('branch.view');
        $branches = $this->branchService->getAllBranch($request->all());
        return response()->json([
            'status' => true,
            'data' => $branches,
            'message' => 'Branches fetched successfull'
        ]);
    }
}
