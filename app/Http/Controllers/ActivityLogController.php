<?php

namespace App\Http\Controllers;

use App\Services\ActivityLogService;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    private $activityLogService;


    public function __construct(ActivityLogService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
    }


    public function getAll(Request $request)
    {
        $activities = $this->activityLogService->getAll($request->all());
        return response()->json([
            'status' => true,
            'data' => $activities,
            'message' => 'Activity log fetched successfull'
        ]);
    }
}
