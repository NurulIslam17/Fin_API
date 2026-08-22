<?php

namespace App\Repositories;

use App\Models\OfficeUser;

class OfficeUserRepository
{

    public function saveOfficeUser($data)
    {
        OfficeUser::create([
            'user_id' => $data['user_id'],
            'employee_id' => generateEmployeeId(),
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'nid' => $data['nid'],
            'date_of_birth' => $data['date_of_birth'],
            'emergency_contact_name' => $data['emergency_contact_name'],
            'emergency_contact_phone' => $data['emergency_contact_phone'],
            'emergency_contact_relation' => $data['emergency_contact_relation']
        ]);
    }
}
