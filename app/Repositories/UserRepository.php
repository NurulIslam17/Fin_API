<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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


    public function addUser($data)
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'branch_id' => $data['branch_id'],
            'password' => Hash::make($data['email']),
        ]);
        // Assign User role
        $user->assignRole('CUSTOMER');
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

    public function deleteBYId($id)
    {
        $user = User::find($id);

        if (! $user) {
            return false;
        }

        return $user->delete();
    }
}
