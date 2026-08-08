<?php

namespace App\Http\Controllers;

use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{

    private $roleService;
    private $permissionService;

    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    public function getRoles()
    {
        authorizePermission("role.view");
        $roles = $this->roleService->getRoles();
        return response()->json([
            'status' => true,
            'message'   => "Roles fetched successfully!",
            'data'      => $roles
        ]);
    }

    public function getPermissions()
    {
        authorizePermission("permission.view");
        $roles = $this->permissionService->getPermissions();
        return response()->json([
            'status' => true,
            'message'   => "Permissions fetched successfully!",
            'data'      => $roles
        ]);
    }

    public function addPermissions(Request $request)
    {
        authorizePermission("permission.create");
        $this->permissionService->addPermissions($request->all());
        return response()->json([
            'status' => true,
            'message'   => "Permissions added successfuly!",
        ]);
    }

    public function rolePermissionsSync(Request $request)
    {
        authorizePermission("permission.assign");
        $this->permissionService->addPermissions($request->all());
        $this->permissionService->rolePermissionsSync($request->all());
        return response()->json([
            'status' => true,
            'message'   => "Role-Permissions sync successfuly!",
        ]);
    }

    public function getRoleWisePermissions(Request $request)
    {
        authorizePermission("permission.view");
        $permissions = $this->permissionService->getRoleWisePermissions($request->all());
        return response()->json([
            "data" => $permissions,
            'status' => true,
            'message'   => "Role wise permissions fetched successfuly!",
        ]);
    }
}
