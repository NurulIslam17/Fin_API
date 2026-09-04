<?php

use App\Models\Customer;
use App\Models\OfficeUser;

if (! function_exists('authorizePermission')) {
    function authorizePermission(string $permission): void
    {
        if (! auth()->user()->can($permission)) {
            abort(response()->json([
                'success' => false,
                'message' => 'You do not have permission to perform this action.',
            ], 403));
        }
    }
}

if (!function_exists('generateEmployeeId')) {
    function generateEmployeeId()
    {
        $lastEmployee = OfficeUser::latest('id')->first();

        $nextNumber = $lastEmployee
            ? ((int) substr($lastEmployee->employee_id, -5)) + 1
            : 1;

        return 'EMP-' . date('Y') . '-' . str_pad(
            $nextNumber,
            5,
            '0',
            STR_PAD_LEFT
        );
    }
}


if (!function_exists('generateCustomerId')) {
    function generateCustomerId(): string
    {
        $year = now()->format('y');
        $month = now()->format('m');

        $prefix = "CUS-{$month}{$year}";

        $lastCustomer = Customer::where('customer_no', 'like', "{$prefix}%")
            ->orderByDesc('id')
            ->first();

        if ($lastCustomer) {
            $lastNumber = (int) substr($lastCustomer->customer_no, -8);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        return $prefix . str_pad(
            $nextNumber,
            8,
            '0',
            STR_PAD_LEFT
        );
    }
}
