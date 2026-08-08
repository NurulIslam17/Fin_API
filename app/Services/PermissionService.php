<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionService
{

    public function getPermissions()
    {
        return Permission::latest()->paginate(10);
    }

    public function addPermissions($data)
    {
        foreach ($data['permissions'] as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }

    public function rolePermissionsSync($data)
    {
        $role = Role::where('name', $data['role'])->firstOrFail();
        // Remove all existing permissions
        $role->syncPermissions($data['permissions']);
        return $role;
    }

    public function getRoleWisePermissions($params)
    {
        $role = Role::where('name', $params['role'])
            ->with('permissions')
            ->firstOrFail();

        return $role->permissions->pluck('name');
    }
}
