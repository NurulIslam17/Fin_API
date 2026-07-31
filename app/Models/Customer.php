<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'branch_id',
        'customer_no',
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'phone',
        'alternate_phone',
        'nid',
        'passport_no',
        'email',
        'occupation',
        'present_address',
        'permanent_address',
        'kyc_status',
        'status',
        'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
