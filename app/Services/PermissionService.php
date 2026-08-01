<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionService
{

    public function getPermissions()
    {
        return Permission::latest()->get();
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
        $role = Role::where('name', $data['role'])->first();
        $role->givePermissionTo($data['permissions']);
    }
}
