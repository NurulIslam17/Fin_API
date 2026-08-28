<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function getAl($params)
    {
        $query = User::query();

        if (isset($params['name']) && $params['name'] !== '') {
            $query->where('name', 'like', '%' . $params['name'] . '%');
        }

        if (isset($params['email']) && $params['email'] !== '') {
            $query->where('email', 'like', '%' . $params['email'] . '%');
        }

        return $query->paginate($params['per_page'] ?? 10);
    }

    public function getAllOfficeUsers($params)
    {
        $authUser = auth()->user();

        $query = User::query()
            ->with(['branch', 'roles', 'officeUser'])
            ->whereHas('officeUser')
            ->where('id', '!=', $authUser->id)
            ->whereDoesntHave('roles', function ($q) {
                $q->whereIn('name', [
                    'SUPER_ADMIN',
                    'CUSTOMER',
                ]);
            });

        // Bank Admin can only see users from their branch
        if ($authUser->hasRole('BANK_ADMIN')) {
            $query->where('branch_id', $authUser->branch_id);
        }

        // Filter by Role
        if (!empty($params['role'])) {
            $query->whereHas('roles', function ($q) use ($params) {
                $q->where('id', $params['role']);
            });
        }

        // Filter by Email
        if (!empty($params['email'])) {
            $query->where('email', 'like', '%' . $params['email'] . '%');
        }

        // Filter by Employee ID
        if (!empty($params['emp_id'])) {
            $query->whereHas('officeUser', function ($q) use ($params) {
                $q->where(
                    'employee_id',
                    'like',
                    '%' . $params['emp_id'] . '%'
                );
            });
        }

        return $query
            ->latest()
            ->paginate($params['per_page'] ?? 10);
    }



    public function addUser($data)
    {
        $role = $data['role'] ?? "CUSTOMER";
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'branch_id' => $data['branch_id'],
            'password' => Hash::make($data['email']),
        ]);
        // Assign User role
        $user->assignRole($role);
        return $user;
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function deleteById($id)
    {
        $user = User::find($id);
        if (! $user) {
            return false;
        }
        return $user->delete();
    }
}
