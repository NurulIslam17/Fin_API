<?php

namespace App\Observers;

use App\Services\ActivityLogService;
use Illuminate\Database\Eloquent\Model;

class ActivityObserver
{
    public function __construct(
        protected ActivityLogService $activityLogService
    ) {}

    /**
     * After creating a model.
     */
    public function created(Model $model): void
    {
        $this->activityLogService->log(
            module: $this->getModuleName($model),
            action: 'create',
            subject: $model,
            newValues: $model->getAttributes(),
            description: $this->getDescription(
                'create',
                $model
            )
        );
    }

    /**
     * Before updating a model.
     * Store old values.
     */
    public function updating(Model $model): void
    {
        $model->oldActivityValues = $model->getOriginal();
    }

    /**
     * After updating a model.
     */
    public function updated(Model $model): void
    {
        $changes = $model->getChanges();

        // Remove updated_at from activity log
        unset($changes['updated_at']);

        if (empty($changes)) {
            return;
        }

        $oldValues = [];

        foreach ($changes as $key => $value) {
            if (isset($model->oldActivityValues[$key])) {
                $oldValues[$key] = $model->oldActivityValues[$key];
            }
        }

        $this->activityLogService->log(
            module: $this->getModuleName($model),
            action: 'update',
            subject: $model,
            oldValues: $oldValues,
            newValues: $changes,
            description: $this->getDescription(
                'update',
                $model
            )
        );
    }

    /**
     * After deleting a model.
     */
    public function deleted(Model $model): void
    {
        $this->activityLogService->log(
            module: $this->getModuleName($model),
            action: 'delete',
            subject: $model,
            oldValues: $model->getOriginal(),
            description: $this->getDescription(
                'delete',
                $model
            )
        );
    }

    protected function getModuleName(Model $model): string
    {
        return strtolower(
            str(class_basename($model))
                ->snake()
                ->replace('_', ' ')
        );
    }

    protected function getDescription(string $action, Model $model): string
    {
        $modelName = class_basename($model);

        return ucfirst($action) . " {$modelName}";
    }
}
