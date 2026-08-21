<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeUser extends Model
{
    use HasFactory;

    protected $table = 'office_users';

    protected $fillable = [
        'user_id',
        'employee_id',
        'gender',
        'date_of_birth',
        'nationality',

        // Contact
        'phone',
        'alternative_phone',
        'personal_email',

        // Address
        'present_address',
        'permanent_address',

        // Employment
        'designation',
        'department',
        'joining_date',
        'resignation_date',

        // Identity
        'nid',
        'passport_no',

        // Emergency contact
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relation',

        // Employment details
        'employee_type',
        'employment_status',
        'salary',

        // Profile
        'profile_photo',

        // Extra
        'notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joining_date' => 'date',
        'resignation_date' => 'date'
    ];

    /**
     * Authentication user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
