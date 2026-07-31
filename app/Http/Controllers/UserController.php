<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
