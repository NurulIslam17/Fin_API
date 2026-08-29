<?php

namespace App\Http\Controllers;

use App\Services\OfficeUserService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $userService;
    private $officeUserService;

    public function __construct(UserService $userService, OfficeUserService $officeUserService)
    {
        $this->userService = $userService;
        $this->officeUserService = $officeUserService;
    }

    public function getAll(Request $request)
    {
        authorizePermission('user.view');
        $users = $this->userService->getAl($request->all());
        return response()->json([
            'status' => true,
            'data' => $users,
            'message' => 'User fetched successfull'
        ]);
    }

    public function addOfficeUser(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $user = $this->userService->addOfficeUser($request->all());
                $data = $request->all();
                $data['user_id'] = $user['id'];
                $this->officeUserService->saveOfficeUser($data);
            });
            return response()->json([
                'status' => true,
                'message' => 'Office user added successfuly.'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to add office user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function deleteOfficeUserById($id)
    {
        authorizePermission('user.delete');
        $this->userService->deleteOfficeUserById($id);
        return response()->json([
            'status' => true,
            'message' => 'Office user removed successfuly'
        ]);
    }

    public function getAllOfficeUsers(Request $request)
    {
        authorizePermission('user.view');
        $officeUsers = $this->userService->getAllOfficeUsers($request->all());
        return response()->json([
            'status' => true,
            'data' => $officeUsers,
            'message' => 'All office user fetched successfull'
        ]);
    }


    public function officeUserById($id)
    {
        authorizePermission('user.view');
        $officeUser = $this->userService->findById($id);
        return response()->json([
            'status' => true,
            'data' => $officeUser,
            'message' => 'Office user fetched successfull'
        ]);
    }

    public function deleteById($id)
    {
        authorizePermission('user.delete');
        $this->userService->deleteBYId($id);
        return response()->json([
            'status' => true,
            'message' => 'Deleted successfully.'
        ]);
    }
}
