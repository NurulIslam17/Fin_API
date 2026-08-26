<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Repositories\ActivityLogRepository;
use Illuminate\Database\Eloquent\Model;

class ActivityLogService
{

    private $activityLogRepository;

    public function __construct(ActivityLogRepository $activityLogRepository)
    {
        $this->activityLogRepository = $activityLogRepository;
    }


    public function getAll($params)
    {
        return $this->activityLogRepository->getAll($params);
    }

    public function log(
        string $module,
        string $action,
        ?Model $subject = null,
        ?array $oldValues = null,
        ?array $newValues = null,
        ?string $description = null,
        ?array $metadata = null
    ) {
        $user = auth()->user();

        return ActivityLog::create([
            'user_id' => $user?->id,
            'bank_id' => $user?->bank_id,
            'branch_id' => $user?->branch_id,

            'module' => $module,
            'action' => $action,

            'description' => $description,

            'subject_type' => $subject ? get_class($subject) : null,
            'subject_id' => $subject?->id,

            'old_values' => $oldValues,
            'new_values' => $newValues,

            'metadata' => $metadata,

            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'url' => request()->fullUrl(),
            'method' => request()->method(),
        ]);
    }
}
