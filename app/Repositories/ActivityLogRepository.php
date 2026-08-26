<?php

namespace App\Repositories;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ActivityLogRepository
{
    public function getAll($params)
    {
        $authUser = auth()->user();
        $query = ActivityLog::query();

        // SUPER_ADMIN can see all activity logs
        if (!$authUser->hasRole('SUPER_ADMIN')) {
            $query->where('user_id', $authUser->id);
        }

        return $query
            ->with([
                'user:id,name,branch_id',
                'user.branch:id,name',
            ])
            ->latest()
            ->paginate($params['per_page'] ?? 5);
    }
}
