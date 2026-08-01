<?php

namespace App\Services;

use Spatie\Permission\Models\Role;

class RoleService
{

    public function getRoles()
    {
        return Role::latest()->get();
    }
}
