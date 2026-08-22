<?php

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
