<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'code',
        'phone',
        'email',
        'manager_name',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'status',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
