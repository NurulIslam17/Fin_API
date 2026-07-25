<?php


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
